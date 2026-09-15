# Auditoria de SoftDeletes — SISDEVE AGRO

## Objetivo

Verificar todos os Models do backend que utilizam o trait `SoftDeletes` e confirmar se a tabela correspondente possui a coluna `deleted_at`.

## Resultado

Foram encontrados **32 Models** utilizando `SoftDeletes`.

- **31 Models**: tabela compatível com `deleted_at`.
- **1 Model**: incompatibilidade encontrada — `TypeOperation`.

### Incompatibilidade encontrada

`App\Models\Registrations\Agricultural\Defensive\TypeOperation` utiliza `SoftDeletes`, porém a migration original de `type_operations` não criava `deleted_at`.

Isso provocava erro HTTP 500 nas consultas do endpoint de tipos de operação, pois o Eloquent acrescentava automaticamente:

```sql
where type_operations.deleted_at is null
```

### Correção aplicada

Foi criada a migration:

```text
2026_09_11_000075_add_deleted_at_to_type_operations_table.php
```

Ela adiciona:

```php
$table->softDeletes();
```

Não foi alterada nenhuma migration já executada.

## Models auditados

| Model | Tabela | `deleted_at` |
|---|---|---|
| AdministrativeCenter | administrative_centers | OK |
| AgriculturalYear | agricultural_years | OK |
| BankSupplier | bank_suppliers | OK |
| Config | configs | OK |
| CostCenter | cost_centers | OK |
| Crop | crops | OK |
| Culture | cultures | OK |
| DriverContract | driver_contracts | OK |
| Driver | drivers | OK |
| DriversContracts | drivers_contracts | OK |
| Farm | farms | OK |
| Field | fields | OK |
| FleetModel | fleet_models | OK |
| Fleet | fleets | OK |
| FuelStation | fuel_stations | OK |
| LanyardContract | lanyard_contracts_links | OK |
| Lanyard | lanyards | OK |
| LanyardsContracts | lanyards_contracts | OK |
| MatrixFreight | matrix_freights | OK |
| OperationDefensive | operation_defensives | OK |
| Owner | owners | OK |
| PlotField | plot_fields | OK |
| Producer | producers | OK |
| ProductGroup | product_groups | OK |
| Product | products | OK |
| SubGroupProduct | sub_group_products | OK |
| SupplierProduct | supplier_products | OK |
| Supplier | suppliers | OK |
| TypeOperation | type_operations | **CORRIGIDO** |
| TypeSupplier | type_suppliers | OK |
| VarietyCulture | variety_cultures | OK |
| Warehouse | warehouses | OK |

## Regra adotada

Todo Model que usar `SoftDeletes` deve possuir uma coluna `deleted_at` na tabela correspondente. Para estruturas já publicadas/executadas, a correção deve ser feita por uma nova migration, nunca editando silenciosamente uma migration que já tenha sido executada em ambientes existentes.
