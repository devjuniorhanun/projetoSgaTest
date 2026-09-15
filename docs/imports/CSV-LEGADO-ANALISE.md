# Análise dos CSVs recebidos

## Quantidade encontrada

| Arquivo | Registros |
|---|---:|
| armazems.csv | 16 |
| centro_administrativos.csv | 4 |
| centro_custos.csv | 51 |
| colhedors.csv | 13 |
| culturas.csv | 4 |
| fazendas.csv | 46 |
| fornecedors.csv | 639 |
| grupo_produtos.csv | 5 |
| locacao_talhaos.csv | 778 |
| matriz_fretes.csv | 313 |
| motoristas.csv | 151 |
| produtors.csv | 2 |
| produtos.csv | 75 |
| safras.csv | 15 |
| sub_grupo_produtos.csv | 18 |
| talhaos.csv | 97 |

## Principais diferenças entre o legado e o banco novo

### IDs

O banco antigo possui `id` e `uuid`. O banco novo utiliza IDs inteiros auto incrementáveis. O importador nunca utiliza o ID antigo como PK do novo banco.

A tabela `legacy_import_maps` mantém a correspondência entre os dois sistemas.

### Status

O legado usa vários formatos:

- `ATIVO`
- `Ativo`
- `ATIVA`
- `DESATIVADO`
- `Desativada`

O novo sistema utiliza:

- `A` = Ativo
- `I` = Inativo

### Fornecedores

O arquivo antigo concentra dados cadastrais e bancários no mesmo CSV. O importador separa os dados bancários em `bank_suppliers`.

### Proprietários

Não foi fornecido `proprietarios.csv`.

Os produtores são utilizados para criar proprietários correspondentes quando necessário. Para referências de fazendas que não possuam correspondência, o modo de compatibilidade pode criar um proprietário técnico `PROPRIETARIO LEGADO N`.

### Anos agrícolas

`Safras` do legado não possuem `agricultural_year_id`. O importador tenta extrair padrões como `20/21` do nome da safra.

Quando isso não é possível, o modo estrito interrompe o processo. O modo de compatibilidade utiliza `LEGADO SEM ANO` com datas técnicas de fallback, e essa decisão deve ser revisada antes de colocar o sistema em produção.

### Variedades

Não foi fornecido `variedades.csv`.

Como `locacao_talhaos.csv` possui `variedade_cultura_id`, existe uma dependência que não pode ser reconstruída integralmente apenas com os arquivos recebidos.

No modo estrito, a importação é interrompida.

No modo de compatibilidade, o importador cria `VARIEDADE LEGADA N`, preservando a relação e deixando os dados técnicos para posterior correção.

## Estratégia recomendada

A primeira execução deve ser feita com `strict=true` após fornecer todos os CSVs disponíveis do sistema antigo.

Somente se algum dado realmente não existir no legado deve ser utilizado `strict=false`, e os registros técnicos devem ser revisados antes da operação definitiva.
