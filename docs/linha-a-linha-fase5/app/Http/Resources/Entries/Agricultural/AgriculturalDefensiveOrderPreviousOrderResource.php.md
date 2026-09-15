# Documentação linha a linha — `app/Http/Resources/Entries/Agricultural/AgriculturalDefensiveOrderPreviousOrderResource.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Define o namespace do recurso de referência anterior.` | Define o namespace do recurso de referência anterior. |
| 4 | `namespace App\Http\Resources\Entries\Agricultural;` | Define o namespace para organizar a classe dentro da arquitetura do projeto. |
| 5 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 6 | `// Importa a classe base.` | Importa a classe base. |
| 7 | `use Illuminate\Http\Resources\Json\JsonResource;` | Importa a classe ou dependência utilizada nesta implementação. |
| 8 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 9 | `// Expõe a relação entre uma OS filha e uma OS anterior.` | Expõe a relação entre uma OS filha e uma OS anterior. |
| 10 | `class AgriculturalDefensiveOrderPreviousOrderResource extends JsonResource` | Declara a classe responsável pelo comportamento deste componente. |
| 11 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 12 | `    // Monta a resposta.` | Monta a resposta. |
| 13 | `    public function toArray($request): array` | Declara um método público responsável por uma operação do componente. |
| 14 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 15 | `        // Retorna os campos da relação.` | Retorna os campos da relação. |
| 16 | `        return [` | Inicia a coleção de configuração, regras ou dados retornados pelo método. |
| 17 | `            // ID da relação.` | ID da relação. |
| 18 | `            'id' => $this->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 19 | `            // ID da nova OS.` | ID da nova OS. |
| 20 | `            'order_id' => $this->order_id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 21 | `            // ID da OS anterior.` | ID da OS anterior. |
| 22 | `            'previous_order_id' => $this->previous_order_id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 23 | `            // Número da OS anterior quando carregada.` | Número da OS anterior quando carregada. |
| 24 | `            'previous_os_number' => $this->whenLoaded('previousOrder', fn () => $this->previousOrder->os_number),` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 25 | `            // Bombas usadas da OS anterior.` | Bombas usadas da OS anterior. |
| 26 | `            'quantity_used' => $this->quantity_used,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 27 | `        ];` | Executa a instrução indicada pela implementação deste arquivo. |
| 28 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 29 | `}` | Executa a instrução indicada pela implementação deste arquivo. |
