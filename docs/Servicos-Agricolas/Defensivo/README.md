# Serviços Agrícolas — Defensivo

Submódulo de execução de serviços com defensivos agrícolas.

## Etapas

1. Criar uma ou mais OS, sempre uma OS por talhão.
2. Relacionar operadores, produtos, dose recomendada e `pump`.
3. Selecionar safra, operador e data para consolidar a necessidade e movimentar produto do estoque físico para o tanque.
4. Fazer fechamentos parciais ou finais.
5. Conciliar retiradas, consumo, devoluções e saldo remanescente.

Quando uma solicitação possui vários talhões, o backend calcula
`recommended_pump` separadamente para cada OS:

```text
recommended_pump = área informada para o talhão ÷ flow
```

O resultado é arredondado para no máximo três casas decimais. O campo enviado pelo
frontend não é reaproveitado entre os talhões e permanece opcional somente para
compatibilidade com versões anteriores do formulário.

## Regra do `pump`

`pump` é a quantidade daquele produto aplicada em uma bomba.

Para planejamento por produto e OS:

```text
quantidade_planejada = pump × recommended_pump
```

`pump` representa a quantidade daquele produto utilizada em uma bomba. Portanto,
a área não pode multiplicar diretamente o produto: ela primeiro determina
`recommended_pump` pela vazão, e somente depois é calculada a quantidade total
planejada do produto.

Toda quantidade calculada ou movimentada de produto é arredondada para no máximo
três casas decimais. A quantidade de bombas (`recommended_pump` e `used_bomb`)
também utiliza no máximo três casas decimais.

No fechamento:

```text
quantidade_real_do_evento = bombas_do_fechamento × pump
```

Cada fechamento é um evento independente e nunca sobrescreve os anteriores.

## Endpoints principais

```text
GET  /api/releases/agricultural/services/defensive/crops
GET  /api/releases/agricultural/services/defensive/fleets/by-function?function=O
GET  /api/releases/agricultural/services/defensive/products
GET  /api/releases/agricultural/services/defensive/crops/{crop}/tank-operators
GET  /api/releases/agricultural/services/defensive/crops/{crop}/tank-dates
GET  /api/releases/agricultural/services/defensive/crops/{crop}/tank-operators/{operator}/open-dates
GET  /api/releases/agricultural/services/defensive/crops/{crop}/tank-operators/{operator}/planning?date=YYYY-MM-DD
POST /api/releases/agricultural/services/defensive/tank/withdrawal
POST /api/releases/agricultural/services/defensive/tank/withdrawals
GET  /api/releases/agricultural/services/defensive/tank/withdrawals
GET  /api/releases/agricultural/services/defensive/tank/withdrawals/{withdrawal}
GET  /api/releases/agricultural/services/defensive/orders
POST /api/releases/agricultural/services/defensive/orders
GET  /api/releases/agricultural/services/defensive/orders/{order}
PATCH /api/releases/agricultural/services/defensive/orders/{order}/products/sequence
POST /api/releases/agricultural/services/defensive/orders/{order}/reissue
POST /api/releases/agricultural/services/defensive/orders/close
GET  /api/releases/agricultural/services/defensive/tank/operator/{operator}?date=YYYY-MM-DD
POST /api/releases/agricultural/services/defensive/tank/movement
```

### Compatibilidade do fechamento com o frontend atual

O contrato oficial do fechamento recebe `os_number` e o identificador real em
`operator_tank_id`. Enquanto o frontend ainda envia `order_id` e coloca o ID do
tanqueiro em `operator_tank_id`, o backend reconhece esse formato legado,
localiza a OS pelo ID e escolhe o primeiro tanque cronológico do operador, a
partir da data programada, que tenha saldo para todos os produtos do evento.

Uma OS antiga pode ser fechada usando tanque de data posterior à aplicação.
Tanques anteriores à data da OS continuam proibidos. Depois do consumo, os
saldos transportados dos tanques posteriores são recalculados em sequência.

O endpoint `tank-operators` retorna somente tanqueiros ativos, sem duplicidade,
que participam de OS abertas da safra selecionada. O campo `id` representa o
`AgriculturalOperator` e deve ser usado nos endpoints de planejamento e tanque;
o campo `name` vem de `supplier.fantasy_name`, com `corporate_reason` como
alternativa.

```json
{
  "data": [
    {
      "id": 1,
      "name": "NOME DO TANQUEIRO"
    }
  ]
}
```

O endpoint `tank-dates` retorna as datas disponíveis no formato esperado pelos
campos de seleção do frontend:

```json
{
  "data": [
    {
      "date": "2026-09-14"
    }
  ]
}
```

Depois de selecionar safra, tanqueiro e data, o endpoint de planejamento retorna
um objeto com a identificação da seleção e a coleção `products`. Os produtos são
obtidos diretamente das OS abertas daquela data que possuem o tanqueiro com
função `T`, inclusive para ordens criadas antes do relacionamento auxiliar por
operador. As quantidades planejada, utilizada, em aberto, saldo no tanque e
necessidade adicional são consolidadas por produto.

```json
{
  "data": {
    "crop": { "id": 16, "name": "SAFRA" },
    "operator": { "id": 1, "name": "NOME DO TANQUEIRO" },
    "date": "2026-09-14",
    "products": []
  }
}
```

## Frota por função

Ao selecionar a função de um operador no formulário, o frontend consulta
`fleets/by-function`:

- `function=O` (Operador): retorna somente frotas ativas do grupo
  `PULVERIZADOR`;
- `function=T` (Tanqueiro): retorna somente frotas ativas do grupo `TRATOR`.

O backend repete essa validação ao salvar ou reemitir uma OS, portanto uma
frota pertencente ao grupo incompatível não pode ser gravada por chamada
direta à API.

A retirada consolidada permite informar uma quantidade operacional diferente da necessidade calculada. A necessidade exibida é `max(open_quantity - tank_balance, 0)`; a quantidade efetivamente retirada é a informada pelo usuário.

## Saldo entre datas do tanque

O produto não consumido permanece no tanque do mesmo operador e compõe a
abertura das datas seguintes:

```text
saldo_atual = saldo_de_abertura + retiradas - consumo - devoluções
```

Ao consultar uma data, os tanques do operador são consolidados em ordem
cronológica até o dia selecionado. Isso também corrige automaticamente uma data
futura que tenha sido consultada antes de uma retirada ou fechamento retroativo.
Enquanto não houver fechamento ou devolução, todo o saldo retirado continua
disponível nas datas seguintes.

## Sequência de produtos no tanque

Ao criar uma OS, cada produto é localizado em `agricultural_products` pelo
`product_id`. O seu `type_formulation_id` determina a prioridade definida em
`type_formulations.order`. Os produtos são gravados do menor para o maior valor
de prioridade e todos os operadores com função `T` recebem a mesma sequência.

Produtos que possuem a mesma prioridade podem ser reordenados manualmente pelo
endpoint de sequência:

```json
{
  "product_ids": [15, 8, 21]
}
```

A lista precisa conter exatamente todos os produtos da OS. Uma alteração manual
não pode mover um produto para fora do seu grupo de prioridade. Quando a ordem
de uma formulação é modificada, somente as OS abertas (`status = A`) são
recalculadas; OS encerradas preservam o histórico.
