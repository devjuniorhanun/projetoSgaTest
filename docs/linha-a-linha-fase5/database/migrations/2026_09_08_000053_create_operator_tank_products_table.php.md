# Documentação linha a linha — `database/migrations/2026_09_08_000053_create_operator_tank_products_table.php`

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
| 10 | `// Define a migration dos produtos existentes em cada tanque.` | Define a migration dos produtos existentes em cada tanque. |
| 11 | `return new class extends Migration` | Define uma migration Laravel para criar ou remover estruturas do banco. |
| 12 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 13 | `    // Cria os saldos de produtos dos tanques.` | Cria os saldos de produtos dos tanques. |
| 14 | `    public function up(): void` | Define a operação executada ao aplicar a migration. |
| 15 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 16 | `        // Cria a tabela de saldo por produto e tanque.` | Cria a tabela de saldo por produto e tanque. |
| 17 | `        Schema::create('operator_tank_products', function (Blueprint $table): void {` | Cria a tabela correspondente ao domínio. |
| 18 | `            // Cria a chave primária.` | Cria a chave primária. |
| 19 | `            $table->id();` | Cria a chave primária inteira auto incrementável. |
| 20 | `            // Relaciona o item ao tanque diário.` | Relaciona o item ao tanque diário. |
| 21 | `            $table->foreignId('operator_tank_id')->constrained('operator_tanks')->cascadeOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 22 | `            // Relaciona o item ao produto.` | Relaciona o item ao produto. |
| 23 | `            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();` | Cria uma chave estrangeira para preservar a integridade referencial. |
| 24 | `            // Guarda o saldo que veio do dia anterior.` | Guarda o saldo que veio do dia anterior. |
| 25 | `            $table->decimal('opening_quantity', 14, 4)->default(0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 26 | `            // Guarda o total retirado do estoque no dia.` | Guarda o total retirado do estoque no dia. |
| 27 | `            $table->decimal('withdrawn_quantity', 14, 4)->default(0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 28 | `            // Guarda o total utilizado em fechamentos no dia.` | Guarda o total utilizado em fechamentos no dia. |
| 29 | `            $table->decimal('used_quantity', 14, 4)->default(0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 30 | `            // Guarda o total devolvido ao estoque no dia.` | Guarda o total devolvido ao estoque no dia. |
| 31 | `            $table->decimal('returned_quantity', 14, 4)->default(0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 32 | `            // Guarda o saldo atual materializado para consulta rápida.` | Guarda o saldo atual materializado para consulta rápida. |
| 33 | `            $table->decimal('current_quantity', 14, 4)->default(0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 34 | `            // Registra criação e atualização.` | Registra criação e atualização. |
| 35 | `            $table->timestamps();` | Cria created_at e updated_at. |
| 36 | `            // Impede o mesmo produto de ter duas linhas no mesmo tanque.` | Impede o mesmo produto de ter duas linhas no mesmo tanque. |
| 37 | `            $table->unique(['operator_tank_id', 'product_id'], 'operator_tank_product_unique');` | Cria uma restrição de unicidade. |
| 38 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 39 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 40 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 41 | `    // Remove a tabela no rollback.` | Remove a tabela no rollback. |
| 42 | `    public function down(): void` | Define a operação de rollback da migration. |
| 43 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 44 | `        // Exclui a tabela caso exista.` | Exclui a tabela caso exista. |
| 45 | `        Schema::dropIfExists('operator_tank_products');` | Remove a tabela durante o rollback somente se ela existir. |
| 46 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 47 | `};` | Executa a instrução indicada pela implementação deste arquivo. |
