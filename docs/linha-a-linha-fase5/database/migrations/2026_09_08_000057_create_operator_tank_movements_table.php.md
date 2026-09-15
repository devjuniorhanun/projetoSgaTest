# Documentação linha a linha — `database/migrations/2026_09_08_000057_create_operator_tank_movements_table.php`

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
| 10 | `// Define a migration do histórico físico de movimentações dos tanques.` | Define a migration do histórico físico de movimentações dos tanques. |
| 11 | `return new class extends Migration` | Define uma migration Laravel para criar ou remover estruturas do banco. |
| 12 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 13 | `    // Cria o histórico de entradas, consumos, devoluções e ajustes do tanque.` | Cria o histórico de entradas, consumos, devoluções e ajustes do tanque. |
| 14 | `    public function up(): void` | Define a operação executada ao aplicar a migration. |
| 15 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `        // Cria a tabela de movimentos.` | Cria a tabela de movimentos. |
| 17 | `        Schema::create('operator_tank_movements', function (Blueprint $table): void {` | Cria a tabela correspondente ao domínio. |
| 18 | `            // Cria a chave primária.` | Cria a chave primária. |
| 19 | `            $table->id();` | Cria a chave primária inteira auto incrementável. |
| 20 | `            // Relaciona o movimento ao tanque.` | Relaciona o movimento ao tanque. |
| 21 | `            $table->foreignId('operator_tank_id')->constrained('operator_tanks')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 22 | `            // Relaciona opcionalmente ao produto.` | Relaciona opcionalmente ao produto. |
| 23 | `            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 24 | `            // Relaciona opcionalmente ao fechamento da OS.` | Relaciona opcionalmente ao fechamento da OS. |
| 25 | `            $table->foreignId('closing_id')->nullable()->constrained('agricultural_defensive_order_closings')->nullOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 26 | `            // Relaciona opcionalmente à OS diretamente.` | Relaciona opcionalmente à OS diretamente. |
| 27 | `            $table->foreignId('order_id')->nullable()->constrained('agricultural_defensive_orders')->nullOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 28 | `            // Define o tipo do movimento.` | Define o tipo do movimento. |
| 29 | `            $table->string('movement_type', 20);` | Executa a instrução indicada pela implementação deste arquivo. |
| 30 | `            // Guarda a quantidade movimentada.` | Guarda a quantidade movimentada. |
| 31 | `            $table->decimal('quantity', 14, 4);` | Executa a instrução indicada pela implementação deste arquivo. |
| 32 | `            // Guarda observação operacional.` | Guarda observação operacional. |
| 33 | `            $table->string('observation', 500)->nullable();` | Executa a instrução indicada pela implementação deste arquivo. |
| 34 | `            // Registra criação e atualização.` | Registra criação e atualização. |
| 35 | `            $table->timestamps();` | Cria created_at e updated_at. |
| 36 | `            // Cria índice para auditoria por tanque.` | Cria índice para auditoria por tanque. |
| 37 | `            $table->index(['operator_tank_id', 'movement_type']);` | Cria um índice para acelerar consultas frequentes. |
| 38 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 39 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 40 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 41 | `    // Remove a tabela no rollback.` | Remove a tabela no rollback. |
| 42 | `    public function down(): void` | Define a operação de rollback da migration. |
| 43 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 44 | `        // Exclui a tabela caso exista.` | Exclui a tabela caso exista. |
| 45 | `        Schema::dropIfExists('operator_tank_movements');` | Remove a tabela durante o rollback somente se ela existir. |
| 46 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 47 | `};` | Executa a instrução indicada pela implementação deste arquivo. |
