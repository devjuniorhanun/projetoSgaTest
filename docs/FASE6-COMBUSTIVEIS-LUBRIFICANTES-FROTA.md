# Fase 6 — Gestão de Combustíveis, Lubrificantes e Frota

## Objetivo
Transformar os controles da planilha legada em processos transacionais do SISDEVE AGRO, sem criar uma tabela para cada aba do Excel.

## Decisões importantes
- `Fleet.marking_type` existente é reutilizado: `H = Horímetro` e `K = Quilômetro`.
- Não foi criada migration para `consumption_measurement_type`.
- Não foi criado Seeder.
- Não são usados `ENUM` no banco; campos controlados usam `CHAR(1)`.
- Não existe módulo de terceiros nesta fase.
- Não são usados `warehouses` para entrada de combustível/lubrificante.
- Produto é global; o estoque operacional é `posto + produto`.
- Tanque representa armazenamento físico e permite aferição por régua.
- Registradora pertence a `posto + produto`, nunca ao tanque.
- Posto móvel usa a mesma entidade `fuel_stations`, com `station_type = M`.
- Lubrificantes podem ser transferidos do posto físico para posto móvel e passam a ter estoque próprio no destino.

## Estoque
A fonte de auditoria é `fuel_stock_movements`. `fuel_station_products.current_stock` é o saldo operacional materializado.

Entradas, saídas, transferências, devoluções e ajustes são registrados como movimentos. O sistema não apaga histórico para corrigir saldo.

## Transferência
Uma confirmação de transferência cria, na mesma transação:
1. movimento de saída no posto origem;
2. movimento de entrada no posto destino;
3. confirmação da transferência.

Se qualquer etapa falhar, toda a transação é revertida.

## Régua
`fuel_tank_gauge_tables` é a calibração cm → litros. `fuel_tank_gauge_readings` é o histórico das aferições.

Quando a medida não existir exatamente na tabela, o serviço faz interpolação linear entre os dois pontos vizinhos.

A leitura de régua não altera automaticamente o estoque contábil; ela é usada para reconciliação.

## Registradora
Cada leitura diária guarda início, fim e quantidade. A quantidade é `fim - início`. A registradora também não altera estoque automaticamente; o abastecimento efetivo é que gera a saída de estoque.

## Consumo
### Frota com Horímetro (`H`)
`L/h = litros abastecidos / horas trabalhadas`

### Frota com Quilômetro (`K`)
`L/km = litros abastecidos / quilômetros percorridos`

O total esperado é calculado conforme a regra definida para o módulo: `L/km × quilômetros percorridos`.

Divisão por zero não gera índice.

## Lubrificantes
A entrada dos tambores de 200 L é lançada diretamente no posto físico que recebeu o produto. A transferência para um comboio/posto móvel reduz o estoque do físico e aumenta o estoque do móvel.

A apresentação de 200 L não é hardcoded nesta fase: deve ser tratada como característica do cadastro do produto quando necessária.

## Endpoints principais
- `/api/releases/fuel/stations`
- `/api/releases/fuel/tanks`
- `/api/releases/fuel/station-products`
- `/api/releases/fuel/registradoras`
- `/api/releases/fuel/gauge-tables`
- `/api/releases/fuel/gauge-readings`
- `/api/releases/fuel/entries`
- `/api/releases/fuel/transfers`
- `/api/releases/fuel/transfers/{id}/confirm`
- `/api/releases/fuel/refuelings`
- `/api/releases/fuel/meter-readings`
- `/api/releases/fuel/oil-changes`
- `/api/releases/fuel/maintenance-plans`
- `/api/releases/fuel/maintenance-records`
- `/api/releases/fuel/dashboard/reconciliation`
- `/api/releases/fuel/dashboard/consumption`

## Ordem de migration
1. postos
2. tanques
3. produtos por posto
4. registradoras
5. leituras de registradora
6. tabela de régua
7. leituras de régua
8. entradas
9. transferências
10. abastecimentos
11. leituras de frota
12. movimentos de estoque
13. trocas de óleo
14. planos de manutenção
15. registros de manutenção
