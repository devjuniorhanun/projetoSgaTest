# Documentação linha a linha — `database/migrations/2026_09_08_000048_create_agricultural_defensive_orders_table.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Importa a classe base para criar uma migration do Laravel.` | Importa a classe base para criar uma migration do Laravel. |
| 4 | `use Illuminate\Database\Migrations\Migration;` | Importa a classe ou dependência utilizada nesta implementação. |
| 5 | `// Importa o objeto usado para definir a estrutura das colunas.` | Importa o objeto usado para definir a estrutura das colunas. |
| 6 | `use Illuminate\Database\Schema\Blueprint;` | Importa a classe ou dependência utilizada nesta implementação. |
| 7 | `// Importa a fachada responsável pelas operações de schema.` | Importa a fachada responsável pelas operações de schema. |
| 8 | `use Illuminate\Support\Facades\Schema;` | Importa a classe ou dependência utilizada nesta implementação. |
| 9 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 10 | `// Retorna uma migration anônima para criar e remover a tabela de OS.` | Retorna uma migration anônima para criar e remover a tabela de OS. |
| 11 | `return new class extends Migration` | Define uma migration Laravel para criar ou remover estruturas do banco. |
| 12 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 13 | `    // Executa a criação da tabela principal das ordens de serviço.` | Executa a criação da tabela principal das ordens de serviço. |
| 14 | `    public function up(): void` | Define a operação executada ao aplicar a migration. |
| 15 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `        // Cria a tabela que representa uma OS individual por talhão.` | Cria a tabela que representa uma OS individual por talhão. |
| 17 | `        Schema::create('agricultural_defensive_orders', function (Blueprint $table): void {` | Cria a tabela correspondente ao domínio. |
| 18 | `            // Cria a chave primária inteira e auto incrementável.` | Cria a chave primária inteira e auto incrementável. |
| 19 | `            $table->id();` | Cria a chave primária inteira auto incrementável. |
| 20 | `            // Guarda o número público da OS e permite que ele seja usado em buscas.` | Guarda o número público da OS e permite que ele seja usado em buscas. |
| 21 | `            $table->unsignedBigInteger('os_number')->nullable()->unique();` | Executa a instrução indicada pela implementação deste arquivo. |
| 22 | `            // Permite relacionar uma OS filha à OS pai geradora.` | Permite relacionar uma OS filha à OS pai geradora. |
| 23 | `            $table->foreignId('parent_order_id')->nullable()->constrained('agricultural_defensive_orders')->nullOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 24 | `            // Relaciona a OS a exatamente um talhão.` | Relaciona a OS a exatamente um talhão. |
| 25 | `            $table->foreignId('field_id')->constrained('fields')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 26 | `            // Guarda a área do talhão destinada à OS.` | Guarda a área do talhão destinada à OS. |
| 27 | `            $table->decimal('area', 12, 3);` | Executa a instrução indicada pela implementação deste arquivo. |
| 28 | `            // Relaciona a OS à safra.` | Relaciona a OS à safra. |
| 29 | `            $table->foreignId('crop_id')->constrained('crops')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 30 | `            // Relaciona a OS à cultura.` | Relaciona a OS à cultura. |
| 31 | `            $table->foreignId('culture_id')->constrained('cultures')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 32 | `            // Relaciona a OS ao tipo de operação agrícola.` | Relaciona a OS ao tipo de operação agrícola. |
| 33 | `            $table->foreignId('type_operation_id')->constrained('type_operations')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 34 | `            // Guarda a data planejada da aplicação.` | Guarda a data planejada da aplicação. |
| 35 | `            $table->date('application_date');` | Executa a instrução indicada pela implementação deste arquivo. |
| 36 | `            // Guarda o volume do tanque/pulverizador.` | Guarda o volume do tanque/pulverizador. |
| 37 | `            $table->decimal('pump_volume', 12, 3);` | Executa a instrução indicada pela implementação deste arquivo. |
| 38 | `            // Guarda a quantidade recomendada de bombas para a OS.` | Guarda a quantidade recomendada de bombas para a OS. |
| 39 | `            $table->decimal('recommended_pump', 12, 4);` | Executa a instrução indicada pela implementação deste arquivo. |
| 40 | `            // Guarda a vazão informada para a operação.` | Guarda a vazão informada para a operação. |
| 41 | `            $table->decimal('flow', 12, 3);` | Executa a instrução indicada pela implementação deste arquivo. |
| 42 | `            // Guarda a capacidade da bomba/tanque informada para a operação.` | Guarda a capacidade da bomba/tanque informada para a operação. |
| 43 | `            $table->decimal('pump_capacity', 12, 3);` | Executa a instrução indicada pela implementação deste arquivo. |
| 44 | `            // Guarda o total real acumulado de bombas utilizadas.` | Guarda o total real acumulado de bombas utilizadas. |
| 45 | `            $table->decimal('used_bomb', 12, 4)->default(0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 46 | `            // Guarda o status operacional da OS.` | Guarda o status operacional da OS. |
| 47 | `            $table->string('status', 1)->default('A');` | Executa a instrução indicada pela implementação deste arquivo. |
| 48 | `            // Registra criação e atualização.` | Registra criação e atualização. |
| 49 | `            $table->timestamps();` | Cria created_at e updated_at. |
| 50 | `            // Cria índice para consultas por talhão.` | Cria índice para consultas por talhão. |
| 51 | `            $table->index('field_id');` | Cria um índice para acelerar consultas frequentes. |
| 52 | `            // Cria índice para consultas por data de aplicação.` | Cria índice para consultas por data de aplicação. |
| 53 | `            $table->index('application_date');` | Cria um índice para acelerar consultas frequentes. |
| 54 | `            // Cria índice para consultas por OS pai.` | Cria índice para consultas por OS pai. |
| 55 | `            $table->index('parent_order_id');` | Cria um índice para acelerar consultas frequentes. |
| 56 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 57 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 58 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 59 | `    // Remove a tabela durante o rollback.` | Remove a tabela durante o rollback. |
| 60 | `    public function down(): void` | Define a operação de rollback da migration. |
| 61 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 62 | `        // Remove a tabela somente se ela existir.` | Remove a tabela somente se ela existir. |
| 63 | `        Schema::dropIfExists('agricultural_defensive_orders');` | Remove a tabela durante o rollback somente se ela existir. |
| 64 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 65 | `};` | Executa a instrução indicada pela implementação deste arquivo. |
