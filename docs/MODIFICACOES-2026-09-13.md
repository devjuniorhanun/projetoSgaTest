# Modificações de 13/09/2026

## Sequência dos defensivos

- A sequência é armazenada em `agricultural_defensive_order_products.sequence`.
- O produto precisa possuir um cadastro agrícola ativo e uma formulação ativa.
- A prioridade principal vem de `type_formulations.order`, em ordem crescente.
- Produtos com a mesma prioridade preservam a ordem enviada e podem ser
  reordenados manualmente.
- A sequência é única por OS e compartilhada por todos os operadores `T`.
- Alterações em `TypeFormulation.order` recalculam somente as OS abertas.
- OS encerradas preservam a sequência histórica.
- O endpoint de alteração é
  `PATCH /api/releases/agricultural/services/defensive/orders/{order}/products/sequence`.

Depois de atualizar o projeto, execute:

```bash
php artisan migrate
php artisan optimize:clear
```

## Módulo Fuel

O módulo foi movido integralmente de `Entries\\Fuel` para `Releases\\Fuel`.
Controllers, Requests, Resources, Models, Services, testes, imports e
documentação acompanham o novo namespace.

Todas as rotas agora usam exclusivamente o prefixo:

```text
/api/releases/fuel
```

As antigas rotas `/api/entries/fuel` não foram mantidas.
