# Fase 4 — Correção da importação da matriz de fretes

## Regra de relacionamento

O arquivo legado `matriz_fretes.csv` possui `safra_id`, enquanto a tabela nova `matrix_freights` possui `crop_id`.

O importador **não copia o valor de `safra_id` para `crop_id`**. O fluxo é:

```text
matriz_fretes.safra_id
        ↓
legacy_import_maps (legacy_entity = crops)
        ↓
crops.id novo
        ↓
matrix_freights.crop_id
```

A tabela `legacy_import_maps` é usada apenas durante a migração para reconstruir os relacionamentos.

## Importação do ZIP completo

Ao importar o conjunto completo, `safras.csv` deve ser processado antes de `matriz_fretes.csv`. O importador cria/resolve o `crop` e registra o mapa antes de gravar a matriz.

Também foram tratados nomes antigos de safras que apresentam apenas o ano final, como `SAFRINHA ... 21`, `SAFRINHA ... 22` etc. Quando possível, a data de início é usada; para safrinhas sem data, o ano agrícola é reconstruído como ano anterior/ano final.

## Importação somente da matriz

Se apenas `matriz_fretes.csv` for enviado, a importação somente poderá ocorrer quando o mapa da safra para `crop` já existir no banco. Caso contrário, o serviço retorna uma mensagem explícita informando que `safras.csv` precisa ser importado primeiro ou enviado no mesmo lote.

Isso evita gravar um `crop_id` incorreto por coincidência numérica.

## Reexecução

Quando uma mesma linha legada da matriz já possui um mapeamento, o registro novo é atualizado em vez de criar uma segunda linha para o mesmo registro legado.
