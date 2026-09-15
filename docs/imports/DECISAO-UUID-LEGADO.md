# Decisão de Migração — UUID do Sistema Antigo

## Regra adotada

O SISDEVE AGRO novo utiliza IDs inteiros auto-incrementáveis.

Durante a importação dos CSVs antigos, o campo `uuid` existente nos arquivos legados é **lido apenas como parte do CSV e completamente ignorado pelo importador**.

O UUID antigo não é:

- gravado nas tabelas novas;
- gravado em `legacy_import_maps`;
- usado como chave estrangeira;
- usado como identificador permanente no SISDEVE AGRO.

## Reconstrução dos relacionamentos

Os CSVs possuem IDs numéricos que são usados durante a execução da migração para localizar o registro correspondente.

Exemplo:

```text
Fornecedor antigo: ID 15
        ↓
Importador cria Supplier
        ↓
Supplier novo: ID 42
        ↓
outros CSVs que apontam para fornecedor 15
        ↓
resolvem para supplier_id = 42
```

O banco novo passa a conhecer somente `42`.

## Tabela de controle

`legacy_import_maps` mantém o relacionamento operacional entre o ID numérico da origem e o ID criado no destino para permitir:

- reconstrução das foreign keys;
- reexecução segura da importação;
- auditoria do lote;
- diagnóstico de referências não resolvidas.

A tabela não possui coluna para UUID legado.

## Arquivos complementares

O importador agora reconhece:

- `proprietarios.csv`;
- `variedade_culturas.csv`.

As variedades são relacionadas à cultura usando `cultura_id`, convertido para o novo `culture_id`.

Os vínculos entre safra e cultura são reconstruídos a partir de `locacao_talhaos.csv`.
