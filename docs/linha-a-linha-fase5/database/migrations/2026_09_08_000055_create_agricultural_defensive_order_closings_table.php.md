# Documentação linha a linha — `database/migrations/2026_09_08_000055_create_agricultural_defensive_order_closings_table.php`

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
| 10 | `// Define a migration dos fechamentos parciais e finais das OS.` | Define a migration dos fechamentos parciais e finais das OS. |
| 11 | `return new class extends Migration` | Define uma migration Laravel para criar ou remover estruturas do banco. |
| 12 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 13 | `    // Cria o histórico de cada fechamento.` | Cria o histórico de cada fechamento. |
| 14 | `    public function up(): void` | Define a operação executada ao aplicar a migration. |
| 15 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `        // Cria a tabela de fechamentos.` | Cria a tabela de fechamentos. |
| 17 | `        Schema::create('agricultural_defensive_order_closings', function (Blueprint $table): void {` | Cria a tabela correspondente ao domínio. |
| 18 | `            // Cria a chave primária.` | Cria a chave primária. |
| 19 | `            $table->id();` | Cria a chave primária inteira auto incrementável. |
| 20 | `            // Relaciona o fechamento à OS.` | Relaciona o fechamento à OS. |
| 21 | `            $table->foreignId('agricultural_defensive_order_id')->constrained('agricultural_defensive_orders')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 22 | `            // Relaciona o fechamento ao tanque que realizou o consumo.` | Relaciona o fechamento ao tanque que realizou o consumo. |
| 23 | `            $table->foreignId('operator_tank_id')->constrained('operator_tanks')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 24 | `            // Guarda a quantidade de bombas utilizadas neste evento.` | Guarda a quantidade de bombas utilizadas neste evento. |
| 25 | `            $table->decimal('closing_bomb', 12, 4);` | Executa a instrução indicada pela implementação deste arquivo. |
| 26 | `            // Define se o evento foi parcial ou final.` | Define se o evento foi parcial ou final. |
| 27 | `            $table->string('closing_type', 10);` | Executa a instrução indicada pela implementação deste arquivo. |
| 28 | `            // Guarda a data/hora efetiva do fechamento.` | Guarda a data/hora efetiva do fechamento. |
| 29 | `            $table->timestamp('closed_at');` | Executa a instrução indicada pela implementação deste arquivo. |
| 30 | `            // Guarda o usuário responsável pelo lançamento.` | Guarda o usuário responsável pelo lançamento. |
| 31 | `            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 32 | `            // Registra criação e atualização.` | Registra criação e atualização. |
| 33 | `            $table->timestamps();` | Cria created_at e updated_at. |
| 34 | `            // Cria índice para o histórico da OS.` | Cria índice para o histórico da OS. |
| 35 | `            $table->index(['agricultural_defensive_order_id', 'closed_at']);` | Cria um índice para acelerar consultas frequentes. |
| 36 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 37 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 38 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 39 | `    // Remove a tabela no rollback.` | Remove a tabela no rollback. |
| 40 | `    public function down(): void` | Define a operação de rollback da migration. |
| 41 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 42 | `        // Exclui a tabela caso exista.` | Exclui a tabela caso exista. |
| 43 | `        Schema::dropIfExists('agricultural_defensive_order_closings');` | Remove a tabela durante o rollback somente se ela existir. |
| 44 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 45 | `};` | Executa a instrução indicada pela implementação deste arquivo. |
