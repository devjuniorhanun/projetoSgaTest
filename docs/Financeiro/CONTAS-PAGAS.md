# Lançamentos financeiros

## Contas pagas

O CRUD está disponível em `/api/releases/financial/pay-accounts` e utiliza
`document_date` como a data efetiva do pagamento. A listagem aceita filtros de
data, relacionamentos, contabilização, unidade e tipo de lançamento.

O centro administrativo precisa estar ativo e pertencer ao produtor informado.
Os centros podem ser consultados por
`/api/registrations/financial/administrative-centers?producer_id={id}`.

## Transferências

`GET /api/releases/financial/pay-accounts/transfers?date=YYYY-MM-DD` retorna os
pagamentos do dia cujo tipo possui `abbreviation = TR`, incluindo fornecedor e
somente suas contas bancárias ativas. Sem data, utiliza o dia atual.

## Folha de pagamento

`POST /api/releases/financial/pay-accounts/payroll` cria um lançamento com:

- `entry_type = PAYROLL`;
- `cost_center_id = 1`;
- `due_date = document_date`.

Esses valores são definidos pelo backend. A atualização de uma folha mantém as
mesmas regras e não permite converter o registro para outro tipo.
