# FASE 5 — Lançamento de Ordens de Serviço de Defensivos Agrícolas

Este documento descreve, arquivo por arquivo, a finalidade e a responsabilidade de cada linha/bloco criado na Fase 5.

## Regra central

- O Frontend pode enviar vários itens em `fields[]`.
- O Backend cria uma OS independente para cada talhão.
- Cada OS possui exatamente um `field_id`.
- Um operador pode participar de várias OS no mesmo dia.
- `dose` e `pump` são preservados como recomendação/histórico do produto.
- `recommended_quantity = pump × recommended_pump`.
- `used_bomb` da OS é o total acumulado de bombas realmente utilizadas. O número público da OS é o ID auto incrementável da própria OS e é preenchido após a criação.
- Cada fechamento guarda somente as bombas daquele evento em `closing_bomb`.
- O consumo real do produto é acumulado usando `actual_quantity = pump × used_bomb`.
- A diferença entre o consumo atual e o consumo já reconhecido é retirada do `TanqueOperador` em cada fechamento.
- A sobra do tanque passa para o tanque do operador do dia seguinte.
- Retirada para o tanque baixa o estoque.
- Devolução do tanque aumenta o estoque.
- `previous_os[]` é usado na edição/reemissão e gera OS filhas ligadas à OS pai.

## Arquivos

### 1. `database/migrations/2026_09_08_000048_create_agricultural_defensive_orders_table.php`

Cria a tabela principal. `field_id` está diretamente na OS para garantir a regra de uma OS para um talhão. `parent_order_id` permite representar OS filhas. `used_bomb` é o total real acumulado.

### 2. `database/migrations/2026_09_08_000049_create_agricultural_defensive_order_operators_table.php`

Cria o vínculo entre OS, operador, frota e função. Não há restrição de uma OS por operador/dia, portanto o mesmo operador pode participar de várias OS.

### 3. `database/migrations/2026_09_08_000050_create_agricultural_defensive_order_products_table.php`

Guarda `dose` e `pump` recomendados, além de `used_bomb`, `recommended_quantity`, `actual_quantity` e `actual_dose`. A dose fica preservada como histórico.

### 4. `database/migrations/2026_09_08_000051_create_agricultural_defensive_order_previous_orders_table.php`

Guarda a relação entre uma nova OS filha e uma OS anterior. `quantity_used` representa as bombas usadas da OS antiga informada no `previous_os`.

### 5. `database/migrations/2026_09_08_000052_create_operator_tanks_table.php`

Cria um tanque por operador e por data. A chave única impede dois tanques do mesmo operador na mesma data.

### 6. `database/migrations/2026_09_08_000053_create_operator_tank_products_table.php`

Materializa o saldo diário por produto: abertura, retiradas, usos, devoluções e saldo atual.

### 7. `database/migrations/2026_09_08_000055_create_agricultural_defensive_order_closings_table.php`

Guarda cada evento de fechamento. `closing_bomb` é somente a quantidade do evento; o `used_bomb` da OS é o acumulado.

### 8. `database/migrations/2026_09_08_000056_create_product_stock_movements_table.php`

Cria auditoria do estoque. Toda retirada para tanque e toda devolução volta para este histórico.

### 9. `database/migrations/2026_09_08_000057_create_operator_tank_movements_table.php`

Registra fisicamente entradas e saídas do tanque, inclusive consumo ligado a fechamentos.

### 10. Models em `app/Models/Entries/Agricultural`

Os Models representam as tabelas e seus relacionamentos Eloquent. As relações foram mantidas separadas para que o Frontend possa consultar OS, produtos, operadores, fechamentos e tanques sem misturar regras de negócio.

### 11. `AgriculturalDefensiveOrderRequest.php`

Valida `fields[]`, operadores, produtos e os dados gerais. A validação estrutural não substitui a validação de área feita no Service.

### 12. `AgriculturalDefensiveOrderClosingRequest.php`

Valida número da OS, tanque, bombas do fechamento e tipo `PARTIAL`/`FINAL`.

### 13. `OperatorTankMovementRequest.php`

Valida retiradas e devoluções.

### 14. Resources

Transformam Models em contrato JSON estável para o React.

### 15. `AgriculturalDefensiveOrderService.php`

É o núcleo do módulo. Cria uma OS por talhão, calcula área disponível, registra produtos e operadores, cria filhas na reemissão, executa fechamentos, calcula consumo real, movimenta tanque e estoque e transporta sobras para o dia seguinte.

### 16. `AgriculturalDefensiveOrderController.php`

Recebe HTTP, valida pelo FormRequest, chama o Service e devolve Resources. A lógica de negócio permanece no Service.

### 17. `routes/api.php`

Registra os endpoints do módulo dentro do grupo autenticado.

## Fluxo de criação

```text
Frontend fields[]
      ↓
Backend valida cada talhão
      ↓
Calcula área disponível
      ↓
Cria uma OS para cada talhão
      ↓
Grava produtos e operadores
```

## Fluxo de execução

```text
Estoque
   ↓ retirada real
TanqueOperador
   ↓ fechamento
OS / Produtos
   ↓ consumo
Saldo do tanque
```

## Fluxo de sobra

```text
Tanque do dia N
      ↓ saldo atual
Tanque do dia N+1
      ↓ abertura
Sem nova baixa no estoque
```

## Fluxo de devolução

```text
TanqueOperador
      ↓ devolução
Estoque
```

## Fluxo de edição

```text
OS pai
  ↓ previous_os[]
OS filha 1
OS filha 2
OS filha N
```

Cada ocorrência do `previous_os` é preservada, inclusive quando o mesmo `os_number` aparece mais de uma vez.
