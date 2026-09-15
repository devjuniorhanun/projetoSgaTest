# Módulo central de Balança e Armazém de Grãos

## Escopo implementado

- cadastros de balanças, canais, armazéns, locais, motoristas, caminhões, descontos, impurezas e configurações de quebra;
- inscrição estadual em `Registrations\\Property\\Registration`;
- recebimento, expedição e saída de impureza com duas pesagens;
- somente uma portaria aberta por caminhão;
- leitura automática idempotente e peso manual autorizado;
- estoque físico e comercial consolidado por produtor, inscrição, safra, cultura e propriedade;
- reserva técnica estimada;
- contratos cujo comprador é fornecedor com `type_suppliers.code=BUYER`;
- transferência parcial para contrato e entre contratos;
- expedição FIFO pelo contrato mais antigo, gerando ticket pai e subtickets;
- cessão de saldo entre produtores;
- quebra técnica mensal pela média dos saldos diários;
- autorizações com separação entre solicitante e aprovador;
- cancelamento e movimentos de estorno.

## Fluxo mínimo de recebimento

1. `POST /api/releases/grain/tickets` com `operation_type=ENTRY`.
2. `POST /api/releases/grain/tickets/{ticket}/capture-weight` com `stage=FIRST`.
3. `PUT /api/releases/grain/tickets/{ticket}/discounts` informando todos os tipos configurados, inclusive zero.
4. Capturar `stage=SECOND`.
5. `POST /api/releases/grain/tickets/{ticket}/close`.

No recebimento, a primeira pesagem é o bruto e a segunda é a tara.

## Fluxo mínimo de expedição

1. Abrir ticket `EXIT`, sem escolher contratos.
2. Capturar tara na primeira pesagem.
3. Capturar bruto na segunda pesagem.
4. Consultar `GET /tickets/{ticket}/available-contracts`.
5. Se houver mais de um contrato, obter autorização `MULTIPLE_CONTRACT_SHIPMENT`.
6. Fechar o ticket.

O backend consome contratos `OPEN/PARTIAL` por `created_at` e `id`, sempre do mais antigo para o mais novo. Se a soma não cobrir o peso, o fechamento é integralmente rejeitado.

## Fórmulas de saldo

```text
usable_physical = physical_balance - pending_impurity_weight
free_commercial = commercial_balance - contract_balance - estimated_technical_reserve
available_for_contract = min(usable_physical, free_commercial)
```

## Quebra técnica

O comando `php artisan grain:apply-technical-loss` processa todos os meses fechados pendentes. O scheduler o executa no primeiro dia do mês às 00:10. A base é a média dos saldos comerciais de fechamento de cada dia do mês.

## Observação sobre descontos

A API já guarda percentual, peso do desconto, versão e snapshot. Enquanto a fórmula oficial não for fornecida, o peso calculado pode ser informado no payload como `discount_weight`. A futura fórmula deverá ser implementada em um serviço versionado, sem alterar os snapshots históricos.
