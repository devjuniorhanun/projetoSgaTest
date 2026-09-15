# Documentação linha a linha — `database/migrations/2026_09_08_000050_create_agricultural_defensive_order_products_table.php`

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
| 10 | `// Define a migration dos produtos da OS.` | Define a migration dos produtos da OS. |
| 11 | `return new class extends Migration` | Define uma migration Laravel para criar ou remover estruturas do banco. |
| 12 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 13 | `    // Cria a tabela de produtos planejados e realizados.` | Cria a tabela de produtos planejados e realizados. |
| 14 | `    public function up(): void` | Define a operação executada ao aplicar a migration. |
| 15 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `        // Cria a tabela intermediária entre OS e produtos.` | Cria a tabela intermediária entre OS e produtos. |
| 17 | `        Schema::create('agricultural_defensive_order_products', function (Blueprint $table): void {` | Cria a tabela correspondente ao domínio. |
| 18 | `            // Cria a chave primária.` | Cria a chave primária. |
| 19 | `            $table->id();` | Cria a chave primária inteira auto incrementável. |
| 20 | `            // Relaciona o item com sua OS.` | Relaciona o item com sua OS. |
| 21 | `            $table->foreignId('agricultural_defensive_order_id')->constrained('agricultural_defensive_orders')->cascadeOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 22 | `            // Relaciona o item ao produto cadastrado.` | Relaciona o item ao produto cadastrado. |
| 23 | `            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 24 | `            // Guarda a dose recomendada/histórica por bomba.` | Guarda a dose recomendada/histórica por bomba. |
| 25 | `            $table->decimal('dose', 12, 4);` | Executa a instrução indicada pela implementação deste arquivo. |
| 26 | `            // Guarda a quantidade recomendada do produto por bomba.` | Guarda a quantidade recomendada do produto por bomba. |
| 27 | `            $table->decimal('pump', 12, 4);` | Executa a instrução indicada pela implementação deste arquivo. |
| 28 | `            // Guarda o total real de bombas utilizado para este produto/OS.` | Guarda o total real de bombas utilizado para este produto/OS. |
| 29 | `            $table->decimal('used_bomb', 12, 4)->default(0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 30 | `            // Guarda a quantidade recomendada calculada para a OS.` | Guarda a quantidade recomendada calculada para a OS. |
| 31 | `            $table->decimal('recommended_quantity', 14, 4)->default(0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 32 | `            // Guarda a quantidade realmente utilizada.` | Guarda a quantidade realmente utilizada. |
| 33 | `            $table->decimal('actual_quantity', 14, 4)->default(0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 34 | `            // Guarda a dose real registrada para histórico.` | Guarda a dose real registrada para histórico. |
| 35 | `            $table->decimal('actual_dose', 12, 4)->nullable();` | Executa a instrução indicada pela implementação deste arquivo. |
| 36 | `            // Registra criação e atualização.` | Registra criação e atualização. |
| 37 | `            $table->timestamps();` | Cria created_at e updated_at. |
| 38 | `            // Impede o mesmo produto de aparecer duas vezes na mesma OS.` | Impede o mesmo produto de aparecer duas vezes na mesma OS. |
| 39 | `            $table->unique(['agricultural_defensive_order_id', 'product_id'], 'ado_product_unique');` | Cria uma restrição de unicidade. |
| 40 | `            // Cria índice para consultas por produto.` | Cria índice para consultas por produto. |
| 41 | `            $table->index('product_id');` | Cria um índice para acelerar consultas frequentes. |
| 42 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 43 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 44 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 45 | `    // Remove a tabela no rollback.` | Remove a tabela no rollback. |
| 46 | `    public function down(): void` | Define a operação de rollback da migration. |
| 47 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 48 | `        // Exclui a tabela caso exista.` | Exclui a tabela caso exista. |
| 49 | `        Schema::dropIfExists('agricultural_defensive_order_products');` | Remove a tabela durante o rollback somente se ela existir. |
| 50 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 51 | `};` | Executa a instrução indicada pela implementação deste arquivo. |
