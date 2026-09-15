# Documentação linha a linha — `database/migrations/2026_09_08_000052_create_operator_tanks_table.php`

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
| 10 | `// Define a migration dos tanques diários dos operadores.` | Define a migration dos tanques diários dos operadores. |
| 11 | `return new class extends Migration` | Define uma migration Laravel para criar ou remover estruturas do banco. |
| 12 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 13 | `    // Cria um tanque operacional por operador e por dia.` | Cria um tanque operacional por operador e por dia. |
| 14 | `    public function up(): void` | Define a operação executada ao aplicar a migration. |
| 15 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `        // Cria a tabela principal do tanque diário.` | Cria a tabela principal do tanque diário. |
| 17 | `        Schema::create('operator_tanks', function (Blueprint $table): void {` | Cria a tabela correspondente ao domínio. |
| 18 | `            // Cria a chave primária.` | Cria a chave primária. |
| 19 | `            $table->id();` | Cria a chave primária inteira auto incrementável. |
| 20 | `            // Relaciona o tanque ao operador agrícola.` | Relaciona o tanque ao operador agrícola. |
| 21 | `            $table->foreignId('operator_id')->constrained('agricultural_operators')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 22 | `            // Define o dia operacional do tanque.` | Define o dia operacional do tanque. |
| 23 | `            $table->date('date');` | Executa a instrução indicada pela implementação deste arquivo. |
| 24 | `            // Guarda o status do tanque diário.` | Guarda o status do tanque diário. |
| 25 | `            $table->string('status', 1)->default('A');` | Executa a instrução indicada pela implementação deste arquivo. |
| 26 | `            // Registra criação e atualização.` | Registra criação e atualização. |
| 27 | `            $table->timestamps();` | Cria created_at e updated_at. |
| 28 | `            // Impede dois tanques para o mesmo operador no mesmo dia.` | Impede dois tanques para o mesmo operador no mesmo dia. |
| 29 | `            $table->unique(['operator_id', 'date'], 'operator_tank_operator_date_unique');` | Cria uma restrição de unicidade. |
| 30 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 31 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 32 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 33 | `    // Remove a tabela no rollback.` | Remove a tabela no rollback. |
| 34 | `    public function down(): void` | Define a operação de rollback da migration. |
| 35 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 36 | `        // Exclui a tabela caso exista.` | Exclui a tabela caso exista. |
| 37 | `        Schema::dropIfExists('operator_tanks');` | Remove a tabela durante o rollback somente se ela existir. |
| 38 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 39 | `};` | Executa a instrução indicada pela implementação deste arquivo. |
