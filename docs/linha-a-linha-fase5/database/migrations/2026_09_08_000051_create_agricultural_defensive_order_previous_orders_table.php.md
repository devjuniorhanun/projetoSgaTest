# Documentação linha a linha — `database/migrations/2026_09_08_000051_create_agricultural_defensive_order_previous_orders_table.php`

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
| 10 | `// Define a migration do histórico de OS anteriores usado na edição.` | Define a migration do histórico de OS anteriores usado na edição. |
| 11 | `return new class extends Migration` | Define uma migration Laravel para criar ou remover estruturas do banco. |
| 12 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 13 | `    // Cria a relação entre a nova OS filha e a OS antiga.` | Cria a relação entre a nova OS filha e a OS antiga. |
| 14 | `    public function up(): void` | Define a operação executada ao aplicar a migration. |
| 15 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `        // Cria a tabela de referência das OS anteriores.` | Cria a tabela de referência das OS anteriores. |
| 17 | `        Schema::create('agricultural_defensive_order_previous_orders', function (Blueprint $table): void {` | Cria a tabela correspondente ao domínio. |
| 18 | `            // Cria a chave primária.` | Cria a chave primária. |
| 19 | `            $table->id();` | Cria a chave primária inteira auto incrementável. |
| 20 | `            // Guarda a nova OS que recebeu a referência.` | Guarda a nova OS que recebeu a referência. |
| 21 | `            $table->foreignId('order_id')->constrained('agricultural_defensive_orders')->cascadeOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 22 | `            // Guarda a OS antiga correspondente ao os_number informado.` | Guarda a OS antiga correspondente ao os_number informado. |
| 23 | `            $table->foreignId('previous_order_id')->constrained('agricultural_defensive_orders')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 24 | `            // Guarda a quantidade de bombas utilizadas da OS antiga.` | Guarda a quantidade de bombas utilizadas da OS antiga. |
| 25 | `            $table->decimal('quantity_used', 12, 4);` | Executa a instrução indicada pela implementação deste arquivo. |
| 26 | `            // Registra criação e atualização.` | Registra criação e atualização. |
| 27 | `            $table->timestamps();` | Cria created_at e updated_at. |
| 28 | `            // Permite a mesma OS antiga aparecer mais de uma vez, pois cada ocorrência pode ter quantidade diferente.` | Permite a mesma OS antiga aparecer mais de uma vez, pois cada ocorrência pode ter quantidade diferente. |
| 29 | `            $table->index(['order_id', 'previous_order_id']);` | Cria um índice para acelerar consultas frequentes. |
| 30 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 31 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 32 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 33 | `    // Remove a tabela no rollback.` | Remove a tabela no rollback. |
| 34 | `    public function down(): void` | Define a operação de rollback da migration. |
| 35 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 36 | `        // Exclui a tabela caso exista.` | Exclui a tabela caso exista. |
| 37 | `        Schema::dropIfExists('agricultural_defensive_order_previous_orders');` | Remove a tabela durante o rollback somente se ela existir. |
| 38 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 39 | `};` | Executa a instrução indicada pela implementação deste arquivo. |
