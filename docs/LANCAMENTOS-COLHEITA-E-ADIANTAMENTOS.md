# Lançamentos de colheita e adiantamentos

## Regras implementadas

- As chaves estrangeiras seguem o padrão inteiro (`foreignId`) já adotado pelo sistema.
- `discount` é percentual; `discount_weight`, `net_weight`, sacas brutas, sacas líquidas e frete são calculados pelo backend.
- Cada saca possui 60 kg.
- A matriz é localizada por safra + bloco do talhão + rota do armazém.
- `shipping_value = gross_bags * matrix_freight.price`.
- `shipping_number` e `control_number` são únicos dentro da safra.
- Safra, motorista, contrato do motorista, colhedor, contrato do colhedor e matriz de frete devem estar ativos e compatíveis.
- Adiantamentos geram um `PayAccount` individual, status `RI`.
- Adiantamento de colhedor usa o fornecedor do cadastro do colhedor e centro de custo `ADIANTAMENTO COLHEITA`.
- Pagamento de colhedor por `TR` exige armazém e cultura, apenas como informação financeira.
- Adiantamento de motorista usa centro de custo `FRETE`.
- O pagamento de frete é realizado por fornecedor, consolidando todos os motoristas dele na safra.
- O saldo de frete é abatido dos lançamentos mais antigos pelo método FIFO.
- Um pagamento nunca pode superar o saldo de frete em aberto.

## Endpoints

- `GET /api/releases/harvest/harvest-releases`
- `GET /api/releases/harvest/plot-fields?crop_id={id}`
- `GET /api/releases/harvest/matrix-freight?crop_id={id}&plot_field_id={id}&warehouse_id={id}`
- `POST /api/releases/harvest/harvest-releases`
- `GET /api/releases/harvest/harvest-releases/{id}`
- `PUT|PATCH /api/releases/harvest/harvest-releases/{id}`
- `DELETE /api/releases/harvest/harvest-releases/{id}`
- `GET /api/releases/financial/advances/harvest`
- `GET /api/releases/financial/advances/harvest/eligible-harvesters?crop_id={id}`
- `GET /api/releases/financial/advances/harvest/driver-suppliers?crop_id={id}`
- `POST /api/releases/financial/advances/harvest`
