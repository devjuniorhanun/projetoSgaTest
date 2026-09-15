# SISDEVE AGRO — Fase 5 — Lançamento de OS de Defensivos Agrícolas

## Objetivo

Implementar no Backend Laravel o lançamento, execução e controle de ordens de serviço de defensivos agrícolas, incluindo talhões, operadores, produtos, TanqueOperador, fechamentos, sobras, devoluções e histórico de estoque.

## Regra de talhões

O Frontend pode enviar vários talhões em `fields[]`. O Backend cria uma OS independente para cada item.

Exemplo:

```json
{
  "fields": [
    {"field_id": 5, "area": 1},
    {"field_id": 8, "area": 2.5}
  ]
}
```

Resultado: duas OS, uma para o talhão 5 e outra para o talhão 8.

## Produtos

Cada produto da OS preserva:

- `dose`: dose recomendada/histórica por bomba;
- `pump`: quantidade recomendada do produto por bomba;
- `recommended_pump`: quantidade de bombas recomendadas na OS;
- `recommended_quantity = pump × recommended_pump`;
- `used_bomb`: total acumulado de bombas realmente utilizadas na OS;
- `actual_quantity = pump × used_bomb`;
- `actual_dose`: cópia da dose registrada para preservar o histórico da execução.

## Fechamento

Cada fechamento possui `closing_bomb`, que representa apenas as bombas daquele evento.

O campo `used_bomb` da OS é acumulado:

`used_bomb = soma de closing_bomb dos fechamentos da OS`.

Fechamentos `PARTIAL` mantêm a OS em execução. O fechamento `FINAL` exige que o total real alcance o `recommended_pump`.

## TanqueOperador

Existe um tanque por operador e por dia. Ao criar o tanque de um novo dia, o saldo positivo do tanque anterior é copiado como `opening_quantity`. Essa cópia não gera nova baixa no estoque.

## Estoque

A retirada para o tanque diminui `products.stock` e gera `product_stock_movements`.

A devolução do tanque aumenta `products.stock` e gera movimentação de entrada por devolução.

## Concorrência

As operações críticas usam transações e `lockForUpdate()` para evitar saldo negativo causado por operações concorrentes.

## Endpoints

- `GET /api/releases/agricultural/services/defensive`
- `POST /api/releases/agricultural/services/defensive`
- `GET /api/releases/agricultural/services/defensive/{order}`
- `POST /api/releases/agricultural/services/defensive/{order}/reissue`
- `POST /api/releases/agricultural/services/defensive/close`
- `GET /api/releases/agricultural/services/defensive/tank/operator/{operator}`
- `POST /api/releases/agricultural/services/defensive/tank/movement`

## Edição / previous_os

A reemissão recebe `previous_os[]`. Cada item contém `os_number` da ordem antiga e `quantity_used` em bombas. O Backend cria uma nova OS filha para cada talhão selecionado e registra a referência da OS anterior.

## Instalação

1. Substitua a pasta `back` pela pasta deste pacote ou copie somente os arquivos da Fase 5 para o Backend existente.
2. Execute `composer install` caso `vendor` ainda não exista.
3. Execute `php artisan migrate`.
4. Limpe caches se necessário com `php artisan optimize:clear`.
5. Teste a API autenticada.

## Validação realizada

Foi executado `php -l` em todos os arquivos PHP do Backend do pacote. A validação sintática foi concluída sem erros.

Não foi executado teste de integração com MySQL neste ambiente de geração porque o pacote-base não continha `vendor` instalado.

## Documentação linha a linha

Consulte `docs/linha-a-linha-fase5/INDEX.md`. A documentação cobre os arquivos PHP criados ou modificados na Fase 5 e não inclui `vendor`.

## Atualizações de organização e cadastros defensivos

- Os cadastros agrícolas defensivos foram organizados no namespace `Registrations\Agricultural\Defensive`.
- Foi criado o CRUD `OperationDefensive`.
- `TypeOperation` agora possui `operation_defensive_id` como relacionamento com `OperationDefensive`.
- Os lançamentos de serviços agrícolas defensivos foram organizados em `Releases\Agricultural\Services\Defensive`.
- O controller principal também possui a fachada `DefensiveServiceController` e o serviço `DefensiveService`.
- O endpoint principal passou para `/api/releases/agricultural/services/defensive`.
