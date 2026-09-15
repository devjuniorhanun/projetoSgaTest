# Serviços Agrícolas

Este é o módulo pai dos serviços operacionais agrícolas do SISDEVE AGRO.

A arquitetura foi preparada para receber novos submódulos sem misturar suas regras de negócio.

## Submódulos

- `Defensivo`: primeiro submódulo implementado.
- Outros submódulos serão adicionados futuramente dentro deste módulo pai.

## Convenção

O código operacional segue:

```text
Releases/Agricultural/Services/<SubModulo>
```

O cadastro de apoio continua separado em `Registrations`, pois cadastro e execução são responsabilidades diferentes.
