# Documentação linha a linha — `database/migrations/2026_09_08_000049_create_agricultural_defensive_order_operators_table.php`

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
| 10 | `// Define a migration da relação entre OS, operadores e frota.` | Define a migration da relação entre OS, operadores e frota. |
| 11 | `return new class extends Migration` | Define uma migration Laravel para criar ou remover estruturas do banco. |
| 12 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 13 | `    // Cria a tabela de operadores vinculados às OS.` | Cria a tabela de operadores vinculados às OS. |
| 14 | `    public function up(): void` | Define a operação executada ao aplicar a migration. |
| 15 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `        // Cria a tabela intermediária.` | Cria a tabela intermediária. |
| 17 | `        Schema::create('agricultural_defensive_order_operators', function (Blueprint $table): void {` | Cria a tabela correspondente ao domínio. |
| 18 | `            // Cria a chave primária.` | Cria a chave primária. |
| 19 | `            $table->id();` | Cria a chave primária inteira auto incrementável. |
| 20 | `            // Relaciona com a OS.` | Relaciona com a OS. |
| 21 | `            $table->foreignId('agricultural_defensive_order_id')->constrained('agricultural_defensive_orders')->cascadeOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 22 | `            // Relaciona com o operador agrícola.` | Relaciona com o operador agrícola. |
| 23 | `            $table->foreignId('operator_id')->constrained('agricultural_operators')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 24 | `            // Relaciona opcionalmente com a frota usada na OS.` | Relaciona opcionalmente com a frota usada na OS. |
| 25 | `            $table->foreignId('fleet_id')->nullable()->constrained('fleets')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 26 | `            // Guarda a função operacional do participante.` | Guarda a função operacional do participante. |
| 27 | `            $table->string('function', 1);` | Executa a instrução indicada pela implementação deste arquivo. |
| 28 | `            // Registra criação e atualização.` | Registra criação e atualização. |
| 29 | `            $table->timestamps();` | Cria created_at e updated_at. |
| 30 | `            // Evita duplicar o mesmo operador/frota/função dentro da mesma OS.` | Evita duplicar o mesmo operador/frota/função dentro da mesma OS. |
| 31 | `            $table->unique(['agricultural_defensive_order_id', 'operator_id', 'fleet_id', 'function'], 'ado_operator_unique');` | Cria uma restrição de unicidade. |
| 32 | `            // Cria índice para consultas por operador.` | Cria índice para consultas por operador. |
| 33 | `            $table->index('operator_id');` | Cria um índice para acelerar consultas frequentes. |
| 34 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 35 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 36 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 37 | `    // Remove a tabela no rollback.` | Remove a tabela no rollback. |
| 38 | `    public function down(): void` | Define a operação de rollback da migration. |
| 39 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 40 | `        // Exclui a tabela caso exista.` | Exclui a tabela caso exista. |
| 41 | `        Schema::dropIfExists('agricultural_defensive_order_operators');` | Remove a tabela durante o rollback somente se ela existir. |
| 42 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 43 | `};` | Executa a instrução indicada pela implementação deste arquivo. |
