# Auditoria Fase 5 / Defensivos — v18

## AgriculturalProduct
O cadastro recebe `active_ingredient` como array obrigatório com pelo menos um item. Cada item contém `active_ingredient` e `concentration`. O service grava o produto e seus ingredientes na mesma transação e substitui o conjunto na atualização.

## SoftDeletes
Os 32 Models que utilizam `SoftDeletes` foram comparados com suas tabelas. Todos possuem `deleted_at`; `TypeOperation` foi corrigido pela migration 000075.

## Fase 5 / execução de OS
A estrutura atual possui controller, service, models e migrations organizados no domínio de Releases/Agricultural/Services/Defensive. O import do `DefensiveServiceController` aponta para o wrapper correto.

As regras de fechamento, tanque diário, retirada, consumo incremental e devolução estão implementadas em transações com bloqueios de concorrência.
