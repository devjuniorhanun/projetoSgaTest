# Notas, estoque, fretes e serviços agrícolas

## Escopo

- estoque geral consolidado em `products.stock` e parcial por produto, local, lote e estado de tratamento;
- locais para postos, sedes, depósitos, almoxarifados e talhões;
- notas de entrada `FUEL`, `LUBRICANT`, `DEFENSIVE`, `INPUT`, `GENERAL` e `SEED`;
- formulários distintos no frontend usando a mesma entidade base;
- importação XML em estágio de conferência e relacionamento do código do fornecedor por `supplier_products`;
- vencimento obrigatório e um `PayAccount` tipo `BO`, status `RI`, para cada parcela;
- provisão e pagamento parcial ou total de fretes, gerando `PayAccount` `BO` ou `TR` por pagamento;
- devolução exclusivamente de estoque, sem alteração financeira;
- preparo do solo, aplicação de um insumo, taxa fixa/variável, operadores, frota e implemento;
- talhão repetível por passada e área copiada automaticamente do cadastro;
- tratamento de sementes por produto, variedade e lote, com baixa dos produtos aplicados;
- manutenção de aceiros;
- saídas por venda, empréstimo e doação.

## Regras transacionais

Toda movimentação atualiza a posição parcial, `products.stock` e `product_stock_movements` na mesma transação. Planejamento de serviço não reserva nem baixa estoque. A baixa usa a quantidade real somente na finalização.

## Rotas

- `/api/registrations/inventory/{catalog}`
- `/api/releases/inventory/balances`
- `/api/releases/inventory/movements`
- `/api/releases/inventory/product-outputs`
- `/api/releases/fiscal/entry-invoices`
- `/api/releases/fiscal/entry-invoices/{id}/confirm`
- `/api/releases/fiscal/entry-invoices/import/xml/preview`
- `/api/releases/fiscal/import-items/{id}/link-product`
- `/api/releases/fiscal/freights`
- `/api/releases/fiscal/freight-payments`
- `/api/releases/fiscal/purchase-returns`
- `/api/releases/agricultural/services`
- `/api/releases/agricultural/seed-treatments`
