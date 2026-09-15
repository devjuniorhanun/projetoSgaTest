# Documentação linha a linha — `app/Models/Entries/Agricultural/OperatorTankMovement.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Define o namespace dos movimentos do tanque.` | Define o namespace dos movimentos do tanque. |
| 4 | `namespace App\Models\Entries\Agricultural;` | Define o namespace para organizar a classe dentro da arquitetura do projeto. |
| 5 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 6 | `// Importa o model base.` | Importa o model base. |
| 7 | `use Illuminate\Database\Eloquent\Model;` | Importa a classe ou dependência utilizada nesta implementação. |
| 8 | `// Importa a relação belongsTo.` | Importa a relação belongsTo. |
| 9 | `use Illuminate\Database\Eloquent\Relations\BelongsTo;` | Importa a classe ou dependência utilizada nesta implementação. |
| 10 | `// Importa o produto.` | Importa o produto. |
| 11 | `use App\Models\Registrations\Product\Product;` | Importa a classe ou dependência utilizada nesta implementação. |
| 12 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 13 | `// Registra cada movimentação física de produto no tanque.` | Registra cada movimentação física de produto no tanque. |
| 14 | `class OperatorTankMovement extends Model` | Declara a classe responsável pelo comportamento deste componente. |
| 15 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `    // Define a tabela.` | Define a tabela. |
| 17 | `    protected $table = 'operator_tank_movements';` | Define explicitamente o nome da tabela usada pelo Eloquent. |
| 18 | `    // Define os campos preenchíveis.` | Define os campos preenchíveis. |
| 19 | `    protected $fillable = ['operator_tank_id', 'product_id', 'closing_id', 'order_id', 'movement_type', 'quantity', 'observation'];` | Define os atributos permitidos para preenchimento em massa. |
| 20 | `    // Define o cast da quantidade.` | Define o cast da quantidade. |
| 21 | `    protected function casts(): array { return ['quantity' => 'decimal:4']; }` | Define conversões automáticas de tipos do Eloquent. |
| 22 | `    // Relaciona ao tanque.` | Relaciona ao tanque. |
| 23 | `    public function tank(): BelongsTo { return $this->belongsTo(OperatorTank::class, 'operator_tank_id'); }` | Declara um método público responsável por uma operação do componente. |
| 24 | `    // Relaciona ao produto.` | Relaciona ao produto. |
| 25 | `    public function product(): BelongsTo { return $this->belongsTo(Product::class); }` | Declara um método público responsável por uma operação do componente. |
| 26 | `    // Relaciona ao fechamento.` | Relaciona ao fechamento. |
| 27 | `    public function closing(): BelongsTo { return $this->belongsTo(AgriculturalDefensiveOrderClosing::class, 'closing_id'); }` | Declara um método público responsável por uma operação do componente. |
| 28 | `    // Relaciona à OS.` | Relaciona à OS. |
| 29 | `    public function order(): BelongsTo { return $this->belongsTo(AgriculturalDefensiveOrder::class, 'order_id'); }` | Declara um método público responsável por uma operação do componente. |
| 30 | `}` | Executa a instrução indicada pela implementação deste arquivo. |
