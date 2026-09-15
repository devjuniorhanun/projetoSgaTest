# Documentação linha a linha — `app/Models/Entries/Agricultural/AgriculturalDefensiveOrderPreviousOrder.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Define o namespace da referência de OS anterior.` | Define o namespace da referência de OS anterior. |
| 4 | `namespace App\Models\Entries\Agricultural;` | Define o namespace para organizar a classe dentro da arquitetura do projeto. |
| 5 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 6 | `// Importa o model base.` | Importa o model base. |
| 7 | `use Illuminate\Database\Eloquent\Model;` | Importa a classe ou dependência utilizada nesta implementação. |
| 8 | `// Importa a relação belongsTo.` | Importa a relação belongsTo. |
| 9 | `use Illuminate\Database\Eloquent\Relations\BelongsTo;` | Importa a classe ou dependência utilizada nesta implementação. |
| 10 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 11 | `// Representa uma referência de uma nova OS para uma OS anterior.` | Representa uma referência de uma nova OS para uma OS anterior. |
| 12 | `class AgriculturalDefensiveOrderPreviousOrder extends Model` | Declara a classe responsável pelo comportamento deste componente. |
| 13 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 14 | `    // Define a tabela.` | Define a tabela. |
| 15 | `    protected $table = 'agricultural_defensive_order_previous_orders';` | Define explicitamente o nome da tabela usada pelo Eloquent. |
| 16 | `    // Define os campos preenchíveis.` | Define os campos preenchíveis. |
| 17 | `    protected $fillable = ['order_id', 'previous_order_id', 'quantity_used'];` | Define os atributos permitidos para preenchimento em massa. |
| 18 | `    // Define o cast da quantidade.` | Define o cast da quantidade. |
| 19 | `    protected function casts(): array { return ['quantity_used' => 'decimal:4']; }` | Define conversões automáticas de tipos do Eloquent. |
| 20 | `    // Retorna a nova OS.` | Retorna a nova OS. |
| 21 | `    public function order(): BelongsTo { return $this->belongsTo(AgriculturalDefensiveOrder::class, 'order_id'); }` | Declara um método público responsável por uma operação do componente. |
| 22 | `    // Retorna a OS anterior.` | Retorna a OS anterior. |
| 23 | `    public function previousOrder(): BelongsTo { return $this->belongsTo(AgriculturalDefensiveOrder::class, 'previous_order_id'); }` | Declara um método público responsável por uma operação do componente. |
| 24 | `}` | Executa a instrução indicada pela implementação deste arquivo. |
