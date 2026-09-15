# Módulo de Importação CSV do Sistema Legado

## Objetivo

Este módulo permite receber os CSVs exportados do banco antigo, analisar o conteúdo e importar os registros para o banco novo sem depender dos IDs antigos como chave primária.

## Arquitetura

1. O usuário envia um CSV ou um ZIP contendo vários CSVs.
2. `LegacyImportRequest` valida o arquivo.
3. `LegacyImportController` recebe a solicitação.
4. `LegacyCsvImportService` extrai, lê, normaliza e importa os dados.
5. `legacy_import_batches` registra cada execução.
6. `legacy_import_maps` relaciona `ID antigo -> ID novo`.
7. As relações entre tabelas são reconstruídas usando os mapas.
8. Uma transação protege o processo de importação.

## Endpoints

### Preview

`POST /api/imports/legacy/preview`

Form-data:

- `file`: CSV ou ZIP.
- `strict`: `true` ou `false`.

O preview não grava dados. Ele informa arquivos encontrados, quantidade de linhas, colunas e avisos conhecidos.

### Importação

`POST /api/imports/legacy`

Form-data:

- `file`: CSV ou ZIP.
- `strict`: `true` ou `false`.

Recomendação: executar primeiro o preview e depois a importação.

## Modo estrito

No modo estrito, o processo para quando uma relação necessária não puder ser reconstruída com segurança.

Exemplos:

- fazenda sem produtor;
- talhão sem fazenda;
- locação sem safra/cultura/variedade;
- armazém sem fornecedor;
- motorista sem fornecedor.

## Modo compatibilidade

No modo `strict=false`, algumas ausências do legado podem ser preservadas por meio de registros técnicos.

Isso é usado principalmente porque o conjunto recebido não contém `proprietarios.csv` nem `variedades.csv`, enquanto o novo banco exige essas relações.

Registros técnicos são identificados com nomes como `PROPRIETARIO LEGADO 4` e `VARIEDADE LEGADA 19`.

## Arquivos atualmente reconhecidos

- `armazems.csv`
- `centro_administrativos.csv`
- `centro_custos.csv`
- `colhedors.csv`
- `culturas.csv`
- `fazendas.csv`
- `fornecedors.csv`
- `grupo_produtos.csv`
- `locacao_talhaos.csv`
- `matriz_fretes.csv`
- `motoristas.csv`
- `produtors.csv`
- `produtos.csv`
- `safras.csv`
- `sub_grupo_produtos.csv`
- `talhaos.csv`

## Pontos importantes encontrados nos CSVs

O conjunto recebido possui 16 arquivos.

Há 639 fornecedores, 151 motoristas, 97 talhões, 778 locações de talhões e 313 registros de matriz de fretes.

O legado utiliza valores diferentes para status, como `ATIVO`, `Ativa`, `DESATIVADO` e `Desativada`. O importador converte esses valores para `A` e `I`.

O arquivo `fornecedors.csv` contém dados bancários na mesma tabela. O importador separa esses dados para `bank_suppliers`.

O arquivo `safras.csv` não possui `agricultural_year_id`. O importador tenta identificar o ano agrícola pelo nome, por exemplo `20/21`.

O conjunto não possui `variedades.csv`. Em modo estrito, uma locação que dependa de uma variedade não fornecida é rejeitada. Em modo compatibilidade, uma variedade técnica é criada para preservar a relação.

O conjunto também não possui `proprietarios.csv`. Em modo compatibilidade, proprietários ausentes podem ser criados como registros técnicos para manter as foreign keys.

## Segurança

O módulo deve permanecer protegido por `auth:sanctum` e pelo papel administrativo `SUPER` ou `ADM`.

O ZIP é extraído usando somente o nome final de cada arquivo, impedindo traversal por caminhos como `../../arquivo.csv`.

## Próximo passo recomendado

Antes da primeira importação definitiva:

1. executar `POST /api/imports/legacy/preview`;
2. revisar os avisos;
3. fornecer os CSVs que estiverem faltando, principalmente `variedades.csv` e `proprietarios.csv`, se existirem;
4. executar a importação em modo estrito;
5. conferir os totais no banco novo;
6. somente depois liberar a importação para uso operacional.
