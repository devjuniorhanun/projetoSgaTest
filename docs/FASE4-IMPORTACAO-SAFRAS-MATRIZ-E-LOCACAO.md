# Fase 4 — Safras por Seed, Matriz de Fretes e Locação de Talhões

## Regra oficial

As safras (`crops`) são cadastradas por **Seed** com IDs definidos de forma controlada. Essa é uma exceção deliberada do processo de migração, porque o sistema legado utilizava as safras em diversos relacionamentos e a sequência original de IDs não era confiável.

Por isso, o importador:

- não cria novas `crops` a partir do CSV de safras;
- não gera um novo ID para uma safra já controlada pela Seed;
- valida a existência de `crops.id` usando o `safra_id` do legado;
- utiliza esse mesmo ID como `crop_id` nas relações que dependem da safra;
- pode registrar o par no `legacy_import_maps` apenas para auditoria, sem transformar o ID.

## Matriz de Fretes

`matriz_fretes.safra_id` é resolvido por `resolveSeededCrop()` e gravado em `matrix_freights.crop_id` somente quando a `crop` correspondente existe.

O arquivo analisado possui 313 registros e todos os `safra_id` utilizados estão presentes nas `crops` cadastradas no banco analisado.

Não existe regra de unicidade para `crop + bloco + percurso`, pois o arquivo possui registros históricos repetidos nessa combinação com valores diferentes.

## Locação de Talhões

`locacao_talhaos.safra_id` segue a mesma regra das Seeds. As demais relações continuam sendo resolvidas pelos mapas de migração correspondentes.

Quando `locacao_talhaos.cultura_id` for diferente do `culture_id` cadastrado na `variety_cultures` referenciada, a locação é preservada e recebe:

```text
status = C
```

`C` significa **Corrigir** e permite que a inconsistência seja tratada manualmente sem perder o registro histórico.

A divergência cultura/variedade não é tratada como erro fatal. Já a ausência de uma relação obrigatória, como talhão, cultura, variedade ou safra inexistente nas Seeds, continua sendo erro de relacionamento no modo estrito.

## Validação dos arquivos analisados

- `matriz_fretes(1).csv`: 313 registros;
- `safra_id` distintos na matriz: 12;
- nenhum `safra_id` da matriz sem `crop` correspondente no banco analisado;
- `locacao_talhaos(1).csv`: 778 registros;
- nenhum `safra_id` da locação sem `crop` correspondente no banco analisado;
- nenhuma variedade referenciada pela locação ficou sem cadastro na base de referência analisada;
- 38 locações possuem divergência entre a cultura informada na locação e a cultura cadastrada na variedade; essas linhas devem ser importadas com `status = C`.

## Reimportação

A matriz mantém o mapeamento do registro histórico (`matrix_freights`) para permitir reexecução sem duplicar a mesma linha do CSV. A combinação `bloco/percurso/safra` não é usada como chave de deduplicação.
