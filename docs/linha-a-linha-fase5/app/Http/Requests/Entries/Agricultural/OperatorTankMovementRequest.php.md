# Documentação linha a linha — `app/Http/Requests/Entries/Agricultural/OperatorTankMovementRequest.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Define o namespace das movimentações do tanque.` | Define o namespace das movimentações do tanque. |
| 4 | `namespace App\Http\Requests\Entries\Agricultural;` | Define o namespace para organizar a classe dentro da arquitetura do projeto. |
| 5 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 6 | `// Importa a classe base de FormRequest.` | Importa a classe base de FormRequest. |
| 7 | `use Illuminate\Foundation\Http\FormRequest;` | Importa a classe ou dependência utilizada nesta implementação. |
| 8 | `// Importa Rule para valores permitidos.` | Importa Rule para valores permitidos. |
| 9 | `use Illuminate\Validation\Rule;` | Importa a classe ou dependência utilizada nesta implementação. |
| 10 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 11 | `// Valida retirada do estoque e devolução do tanque.` | Valida retirada do estoque e devolução do tanque. |
| 12 | `class OperatorTankMovementRequest extends FormRequest` | Declara a classe responsável pelo comportamento deste componente. |
| 13 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 14 | `    // Autoriza usuários autenticados.` | Autoriza usuários autenticados. |
| 15 | `    public function authorize(): bool { return true; }` | Declara um método público responsável por uma operação do componente. |
| 16 | `    // Define as regras.` | Define as regras. |
| 17 | `    public function rules(): array` | Declara um método público responsável por uma operação do componente. |
| 18 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 19 | `        // Retorna o contrato da API.` | Retorna o contrato da API. |
| 20 | `        return [` | Inicia a coleção de configuração, regras ou dados retornados pelo método. |
| 21 | `            // Identifica o tanque.` | Identifica o tanque. |
| 22 | `            'operator_tank_id' => ['required', 'integer', 'exists:operator_tanks,id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 23 | `            // Identifica o produto.` | Identifica o produto. |
| 24 | `            'product_id' => ['required', 'integer', 'exists:products,id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 25 | `            // Quantidade física movimentada.` | Quantidade física movimentada. |
| 26 | `            'quantity' => ['nullable', 'numeric', 'gt:0', 'required_if:movement_type,RETURN'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 27 | `            // Tipo da movimentação.` | Tipo da movimentação. |
| 28 | `            'movement_type' => ['required', Rule::in(['WITHDRAWAL', 'RETURN'])],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 29 | `            // OS opcional para rastreabilidade da retirada.` | OS opcional para rastreabilidade da retirada. |
| 30 | `            'order_id' => ['nullable', 'integer', 'exists:agricultural_defensive_orders,id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 31 | `            // Observação opcional.` | Observação opcional. |
| 32 | `            'observation' => ['nullable', 'string', 'max:500'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 33 | `        ];` | Executa a instrução indicada pela implementação deste arquivo. |
| 34 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 35 | `    // Define mensagens em português.` | Define mensagens em português. |
| 36 | `    public function messages(): array` | Declara um método público responsável por uma operação do componente. |
| 37 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 38 | `        // Retorna as mensagens.` | Retorna as mensagens. |
| 39 | `        return [` | Inicia a coleção de configuração, regras ou dados retornados pelo método. |
| 40 | `            // Obrigatório.` | Obrigatório. |
| 41 | `            'required' => 'O campo :attribute é obrigatório.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 42 | `            // Inteiro.` | Inteiro. |
| 43 | `            'integer' => 'O campo :attribute deve ser um número inteiro.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 44 | `            // Numérico.` | Numérico. |
| 45 | `            'numeric' => 'O campo :attribute deve ser numérico.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 46 | `            // Positivo.` | Positivo. |
| 47 | `            'gt.numeric' => 'O campo :attribute deve ser maior que zero.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 48 | `            // Existente.` | Existente. |
| 49 | `            'exists' => 'O registro selecionado em :attribute não existe.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 50 | `            // Lista fechada.` | Lista fechada. |
| 51 | `            'in' => 'O tipo de movimentação informado é inválido.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 52 | `            // Texto.` | Texto. |
| 53 | `            'string' => 'O campo :attribute deve ser um texto.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 54 | `            // Tamanho.` | Tamanho. |
| 55 | `            'max.string' => 'O campo :attribute não pode ter mais de :max caracteres.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 56 | `        ];` | Executa a instrução indicada pela implementação deste arquivo. |
| 57 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 58 | `    // Traduz os nomes.` | Traduz os nomes. |
| 59 | `    public function attributes(): array` | Declara um método público responsável por uma operação do componente. |
| 60 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 61 | `        // Retorna os nomes amigáveis.` | Retorna os nomes amigáveis. |
| 62 | `        return [` | Inicia a coleção de configuração, regras ou dados retornados pelo método. |
| 63 | `            // Tanque.` | Tanque. |
| 64 | `            'operator_tank_id' => 'tanque do operador',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 65 | `            // Produto.` | Produto. |
| 66 | `            'product_id' => 'produto',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 67 | `            // Quantidade.` | Quantidade. |
| 68 | `            'quantity' => 'quantidade',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 69 | `            // Tipo.` | Tipo. |
| 70 | `            'movement_type' => 'tipo de movimentação',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 71 | `            // OS.` | OS. |
| 72 | `            'order_id' => 'ordem de serviço',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 73 | `            // Observação.` | Observação. |
| 74 | `            'observation' => 'observação',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 75 | `        ];` | Executa a instrução indicada pela implementação deste arquivo. |
| 76 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 77 | `}` | Executa a instrução indicada pela implementação deste arquivo. |
