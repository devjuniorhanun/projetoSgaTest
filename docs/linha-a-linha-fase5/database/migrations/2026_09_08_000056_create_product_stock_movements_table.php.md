# Documentação linha a linha — `database/migrations/2026_09_08_000056_create_product_stock_movements_table.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Importa a classe base de migrations.` | Importa a classe base de migrations. |
| 4 | `use Illuminate\Database\Migrations\Migration;` | Importa a classe ou dependência utilizada nesta implementação. |
| 5 | `// Importa o construtor de tabelas.` | Importa o construtor de tabelas. |
| 6 | `use Illuminate\Database\Schema\Blueprint;` | Importa a classe ou dependência utilizada nesta implementação. |
| 7 | `// Importa a fachada de schema.` | Importa a fachada de schema. |
| 8 | `use Illuminate\Support\Facades\Schema;` | Importa a classe ou dependência utilizada nesta implementação. |
| 9 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 10 | `// Define a migration do histórico de estoque dos produtos.` | Define a migration do histórico de estoque dos produtos. |
| 11 | `return new class extends Migration` | Define uma migration Laravel para criar ou remover estruturas do banco. |
| 12 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 13 | `    // Cria o histórico de entradas, retiradas, devoluções e ajustes.` | Cria o histórico de entradas, retiradas, devoluções e ajustes. |
| 14 | `    public function up(): void` | Define a operação executada ao aplicar a migration. |
| 15 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `        // Cria a tabela de movimentações de estoque.` | Cria a tabela de movimentações de estoque. |
| 17 | `        Schema::create('product_stock_movements', function (Blueprint $table): void {` | Cria a tabela correspondente ao domínio. |
| 18 | `            // Cria a chave primária.` | Cria a chave primária. |
| 19 | `            $table->id();` | Cria a chave primária inteira auto incrementável. |
| 20 | `            // Relaciona o movimento ao produto.` | Relaciona o movimento ao produto. |
| 21 | `            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 22 | `            // Relaciona opcionalmente à OS.` | Relaciona opcionalmente à OS. |
| 23 | `            $table->foreignId('order_id')->nullable()->constrained('agricultural_defensive_orders')->nullOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 24 | `            // Relaciona opcionalmente ao tanque.` | Relaciona opcionalmente ao tanque. |
| 25 | `            $table->foreignId('operator_tank_id')->nullable()->constrained('operator_tanks')->nullOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 26 | `            // Define o tipo do movimento.` | Define o tipo do movimento. |
| 27 | `            $table->string('movement_type', 30);` | Executa a instrução indicada pela implementação deste arquivo. |
| 28 | `            // Guarda a quantidade movimentada.` | Guarda a quantidade movimentada. |
| 29 | `            $table->decimal('quantity', 14, 4);` | Executa a instrução indicada pela implementação deste arquivo. |
| 30 | `            // Guarda o saldo antes da movimentação.` | Guarda o saldo antes da movimentação. |
| 31 | `            $table->decimal('stock_before', 14, 4);` | Executa a instrução indicada pela implementação deste arquivo. |
| 32 | `            // Guarda o saldo depois da movimentação.` | Guarda o saldo depois da movimentação. |
| 33 | `            $table->decimal('stock_after', 14, 4);` | Executa a instrução indicada pela implementação deste arquivo. |
| 34 | `            // Guarda observação operacional.` | Guarda observação operacional. |
| 35 | `            $table->string('observation', 500)->nullable();` | Executa a instrução indicada pela implementação deste arquivo. |
| 36 | `            // Guarda o usuário que realizou a movimentação.` | Guarda o usuário que realizou a movimentação. |
| 37 | `            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 38 | `            // Registra criação e atualização.` | Registra criação e atualização. |
| 39 | `            $table->timestamps();` | Cria created_at e updated_at. |
| 40 | `            // Cria índice para auditoria por produto.` | Cria índice para auditoria por produto. |
| 41 | `            $table->index(['product_id', 'movement_type']);` | Cria um índice para acelerar consultas frequentes. |
| 42 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 43 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 44 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 45 | `    // Remove a tabela no rollback.` | Remove a tabela no rollback. |
| 46 | `    public function down(): void` | Define a operação de rollback da migration. |
| 47 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 48 | `        // Exclui a tabela caso exista.` | Exclui a tabela caso exista. |
| 49 | `        Schema::dropIfExists('product_stock_movements');` | Remove a tabela durante o rollback somente se ela existir. |
| 50 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 51 | `};` | Executa a instrução indicada pela implementação deste arquivo. |
