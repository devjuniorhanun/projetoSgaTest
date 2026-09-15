# SISDEVE AGRO — Fase 3

## Objetivo

Esta fase implementa os cadastros de Propriedade, Fornecedores, Contratos, Frota, Operações Agrícolas, Produtos e Centros Financeiros.

## Padrão de identificadores

Todos os novos cadastros usam `id()` do Laravel, portanto o identificador é inteiro, auto incremento e compatível com `foreignId()`.

## Melhorias aplicadas

1. Status padronizado para `A` = Ativo e `I` = Inativo, corrigindo os campos que originalmente informavam `1`.
2. Campos com valores padrão usam `sometimes` no FormRequest, permitindo que o banco aplique o valor padrão quando omitidos.
3. Datas de contratos e anos/safras possuem validação de ordem quando aplicável.
4. Relacionamentos usam Foreign Keys com `restrictOnDelete` para evitar exclusão acidental de registros referenciados.
5. Tipo de fornecedor utiliza relação N:N por tabela `supplier_type_supplier`.
6. Dados bancários são `hasMany` do fornecedor, pois a entidade possui `supplier_id`; isso é mais coerente com o modelo apresentado do que `belongsToMany`.
7. Contratos de motorista foram vinculados diretamente a `Driver` e contratos de colhedor diretamente a `Lanyard`. O campo `supplier_id` informado originalmente nos vínculos foi substituído por `driver_id`/`lanyard_id`, pois o fornecedor já é conhecido pelo próprio cadastro do motorista/colhedor.
8. `AgriculturalOperator` recebeu `type_operation_id`, porque sem essa referência o cadastro de `TypeOperation` ficaria sem vínculo funcional.
9. `AgriculturalProduct` depende de `Product` e `TypeFormulation`; as migrations foram ordenadas para respeitar essas dependências.
10. `PlotField` possui validação de negócio para garantir que a variedade pertence à cultura e que a cultura está vinculada à safra.
11. `Farm` possui validação de negócio para garantir que o produtor pertence ao proprietário informado.
12. `Fleet` possui validação de negócio para garantir que o modelo pertence à marca selecionada.
13. FormRequests possuem mensagens em português brasileiro e nomes amigáveis de atributos.
14. Controllers permanecem finos e delegam persistência aos Services.
15. Models, Controllers, Requests, Resources, Services e migrations receberam comentários explicativos no próprio código para facilitar o aprendizado e manutenção.

## Observação sobre unicidade

As unicidades fornecidas foram mantidas quando fazem sentido como identificação global, como nome de grupo, marca, motorista, placa e documentos. Para relacionamentos que naturalmente dependem de contexto, deve-se preferir índice composto.

## Entidades

### Propriedade
- Owner
- Producer
- Farm
- Field
- PlotField
- MatrixFreight

### Fornecedores
- TypeSupplier
- Supplier
- BankSupplier
- Warehouse
- Lanyard
- Driver
- DriversContracts
- LanyardsContracts
- DriverContract
- LanyardContract

### Frota
- FleetGroup
- FleetBrand
- FleetModel
- Fleet

### Agrícola
- TypeOperation
- AgriculturalOperator
- TypeFormulation
- AgriculturalProduct
- ActiveIngredient

### Produtos
- ProductGroup
- SubGroupProduct
- Product
- SupplierProduct

### Financeiro
- AdministrativeCenter
- CostCenter
- TypePayAccount

## Rotas

Todas as rotas REST da Fase 3 estão em `routes/api.php` e seguem o padrão `apiResource`.

Os cadastros permanecem protegidos por `auth:sanctum` e pelo middleware de perfil `SUPER,ADM`, mantendo o padrão validado na Fase 1.
