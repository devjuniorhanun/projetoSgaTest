# Documentação linha a linha — `app/Http/Requests/Entries/Agricultural/AgriculturalDefensiveOrderRequest.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Define o namespace da requisição de OS.` | Define o namespace da requisição de OS. |
| 4 | `namespace App\Http\Requests\Entries\Agricultural;` | Define o namespace para organizar a classe dentro da arquitetura do projeto. |
| 5 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 6 | `// Importa a classe base de FormRequest.` | Importa a classe base de FormRequest. |
| 7 | `use Illuminate\Foundation\Http\FormRequest;` | Importa a classe ou dependência utilizada nesta implementação. |
| 8 | `// Importa Rule para listas fechadas.` | Importa Rule para listas fechadas. |
| 9 | `use Illuminate\Validation\Rule;` | Importa a classe ou dependência utilizada nesta implementação. |
| 10 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 11 | `// Valida a criação e atualização de uma OS.` | Valida a criação e atualização de uma OS. |
| 12 | `class AgriculturalDefensiveOrderRequest extends FormRequest` | Declara a classe responsável pelo comportamento deste componente. |
| 13 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 14 | `    // Permite a validação para usuários já autenticados pela rota.` | Permite a validação para usuários já autenticados pela rota. |
| 15 | `    public function authorize(): bool { return true; }` | Declara um método público responsável por uma operação do componente. |
| 16 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 17 | `    // Define as regras do payload.` | Define as regras do payload. |
| 18 | `    public function rules(): array` | Declara um método público responsável por uma operação do componente. |
| 19 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 20 | `        // Retorna as regras de todos os campos.` | Retorna as regras de todos os campos. |
| 21 | `        return [` | Inicia a coleção de configuração, regras ou dados retornados pelo método. |
| 22 | `            // Exige ao menos um talhão.` | Exige ao menos um talhão. |
| 23 | `            'fields' => ['required', 'array', 'min:1'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 24 | `            // Cada talhão precisa ser um objeto/lista.` | Cada talhão precisa ser um objeto/lista. |
| 25 | `            'fields.*' => ['required', 'array'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 26 | `            // Valida o identificador do talhão.` | Valida o identificador do talhão. |
| 27 | `            'fields.*.field_id' => ['required', 'integer', 'exists:fields,id', 'distinct'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 28 | `            // Valida a área de cada talhão.` | Valida a área de cada talhão. |
| 29 | `            'fields.*.area' => ['required', 'numeric', 'gt:0'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 30 | `            // Valida a safra.` | Valida a safra. |
| 31 | `            'crop_id' => ['required', 'integer', 'exists:crops,id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 32 | `            // Valida a cultura.` | Valida a cultura. |
| 33 | `            'culture_id' => ['required', 'integer', 'exists:cultures,id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 34 | `            // Valida o tipo de operação.` | Valida o tipo de operação. |
| 35 | `            'type_operation_id' => ['required', 'integer', 'exists:type_operations,id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 36 | `            // Valida a data da aplicação.` | Valida a data da aplicação. |
| 37 | `            'application_date' => ['required', 'date'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 38 | `            // Valida o volume.` | Valida o volume. |
| 39 | `            'pump_volume' => ['required', 'numeric', 'gt:0'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 40 | `            // Valida a quantidade recomendada de bombas.` | Valida a quantidade recomendada de bombas. |
| 41 | `            'recommended_pump' => ['required', 'numeric', 'gt:0'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 42 | `            // Valida a vazão.` | Valida a vazão. |
| 43 | `            'flow' => ['required', 'numeric', 'gt:0'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 44 | `            // Valida a capacidade.` | Valida a capacidade. |
| 45 | `            'pump_capacity' => ['required', 'numeric', 'gt:0'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 46 | `            // Permite status somente A ou I.` | Permite status somente A ou I. |
| 47 | `            'status' => ['sometimes', Rule::in(['A', 'I'])],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 48 | `            // Exige operadores.` | Exige operadores. |
| 49 | `            'operators' => ['required', 'array', 'min:1'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 50 | `            // Valida cada operador.` | Valida cada operador. |
| 51 | `            'operators.*' => ['required', 'array'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 52 | `            // Valida o operador.` | Valida o operador. |
| 53 | `            'operators.*.operator_id' => ['required', 'integer', 'exists:agricultural_operators,id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 54 | `            // Valida a frota opcional.` | Valida a frota opcional. |
| 55 | `            'operators.*.fleet_id' => ['nullable', 'integer', 'exists:fleets,id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 56 | `            // Valida as funções operacionais permitidas.` | Valida as funções operacionais permitidas. |
| 57 | `            'operators.*.function' => ['required', 'string', Rule::in(['O', 'T'])],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 58 | `            // Exige produtos.` | Exige produtos. |
| 59 | `            'products' => ['required', 'array', 'min:1'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 60 | `            // Valida cada produto.` | Valida cada produto. |
| 61 | `            'products.*' => ['required', 'array'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 62 | `            // Valida o produto.` | Valida o produto. |
| 63 | `            'products.*.product_id' => ['required', 'integer', 'exists:products,id', 'distinct'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 64 | `            // Guarda a dose recomendada/histórica.` | Guarda a dose recomendada/histórica. |
| 65 | `            'products.*.dose' => ['required', 'numeric', 'gt:0'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 66 | `            // Guarda a quantidade recomendada do produto por bomba.` | Guarda a quantidade recomendada do produto por bomba. |
| 67 | `            'products.*.pump' => ['required', 'numeric', 'gt:0'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 68 | `        ];` | Executa a instrução indicada pela implementação deste arquivo. |
| 69 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 70 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 71 | `    // Define mensagens de validação em português brasileiro.` | Define mensagens de validação em português brasileiro. |
| 72 | `    public function messages(): array` | Declara um método público responsável por uma operação do componente. |
| 73 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 74 | `        // Retorna as mensagens customizadas.` | Retorna as mensagens customizadas. |
| 75 | `        return [` | Inicia a coleção de configuração, regras ou dados retornados pelo método. |
| 76 | `            // Mensagem para campos obrigatórios.` | Mensagem para campos obrigatórios. |
| 77 | `            'required' => 'O campo :attribute é obrigatório.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 78 | `            // Mensagem para arrays.` | Mensagem para arrays. |
| 79 | `            'array' => 'O campo :attribute deve ser uma lista.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 80 | `            // Mensagem para mínimo de itens.` | Mensagem para mínimo de itens. |
| 81 | `            'min.array' => 'Informe pelo menos um item em :attribute.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 82 | `            // Mensagem para inteiros.` | Mensagem para inteiros. |
| 83 | `            'integer' => 'O campo :attribute deve ser um número inteiro.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 84 | `            // Mensagem para números.` | Mensagem para números. |
| 85 | `            'numeric' => 'O campo :attribute deve ser numérico.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 86 | `            // Mensagem para maior que zero.` | Mensagem para maior que zero. |
| 87 | `            'gt.numeric' => 'O campo :attribute deve ser maior que zero.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 88 | `            // Mensagem para existência.` | Mensagem para existência. |
| 89 | `            'exists' => 'O registro selecionado em :attribute não existe.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 90 | `            // Mensagem para data.` | Mensagem para data. |
| 91 | `            'date' => 'O campo :attribute deve ser uma data válida.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 92 | `            // Mensagem para valores fechados.` | Mensagem para valores fechados. |
| 93 | `            'in' => 'O valor informado para :attribute é inválido.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 94 | `            // Mensagem para duplicidade.` | Mensagem para duplicidade. |
| 95 | `            'distinct' => 'Não informe registros repetidos em :attribute.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 96 | `        ];` | Executa a instrução indicada pela implementação deste arquivo. |
| 97 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 98 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 99 | `    // Traduz os nomes técnicos para mensagens amigáveis.` | Traduz os nomes técnicos para mensagens amigáveis. |
| 100 | `    public function attributes(): array` | Declara um método público responsável por uma operação do componente. |
| 101 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 102 | `        // Retorna os nomes públicos.` | Retorna os nomes públicos. |
| 103 | `        return [` | Inicia a coleção de configuração, regras ou dados retornados pelo método. |
| 104 | `            // Nome do array de talhões.` | Nome do array de talhões. |
| 105 | `            'fields' => 'talhões',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 106 | `            // Nome do identificador do talhão.` | Nome do identificador do talhão. |
| 107 | `            'fields.*.field_id' => 'talhão',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 108 | `            // Nome da área.` | Nome da área. |
| 109 | `            'fields.*.area' => 'área do talhão',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 110 | `            // Nome da safra.` | Nome da safra. |
| 111 | `            'crop_id' => 'safra',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 112 | `            // Nome da cultura.` | Nome da cultura. |
| 113 | `            'culture_id' => 'cultura',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 114 | `            // Nome da operação.` | Nome da operação. |
| 115 | `            'type_operation_id' => 'tipo de operação',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 116 | `            // Nome da data.` | Nome da data. |
| 117 | `            'application_date' => 'data de aplicação',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 118 | `            // Nome do volume.` | Nome do volume. |
| 119 | `            'pump_volume' => 'volume da bomba',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 120 | `            // Nome da bomba recomendada.` | Nome da bomba recomendada. |
| 121 | `            'recommended_pump' => 'bombas recomendadas',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 122 | `            // Nome da vazão.` | Nome da vazão. |
| 123 | `            'flow' => 'vazão',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 124 | `            // Nome da capacidade.` | Nome da capacidade. |
| 125 | `            'pump_capacity' => 'capacidade da bomba',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 126 | `            // Nome dos operadores.` | Nome dos operadores. |
| 127 | `            'operators' => 'operadores',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 128 | `            // Nome do operador individual.` | Nome do operador individual. |
| 129 | `            'operators.*.operator_id' => 'operador',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 130 | `            // Nome da frota.` | Nome da frota. |
| 131 | `            'operators.*.fleet_id' => 'frota',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 132 | `            // Nome da função.` | Nome da função. |
| 133 | `            'operators.*.function' => 'função',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 134 | `            // Nome dos produtos.` | Nome dos produtos. |
| 135 | `            'products' => 'produtos',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 136 | `            // Nome do produto individual.` | Nome do produto individual. |
| 137 | `            'products.*.product_id' => 'produto',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 138 | `            // Nome da dose.` | Nome da dose. |
| 139 | `            'products.*.dose' => 'dose',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 140 | `            // Nome do pump do produto.` | Nome do pump do produto. |
| 141 | `            'products.*.pump' => 'quantidade por bomba',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 142 | `            // Nome da lista de ordens anteriores.` | Nome da lista de ordens anteriores. |
| 143 | `            'previous_os' => 'ordens anteriores',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 144 | `            // Nome da OS anterior.` | Nome da OS anterior. |
| 145 | `            'previous_os.*.os_number' => 'número da OS anterior',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 146 | `            // Nome da quantidade usada.` | Nome da quantidade usada. |
| 147 | `            'previous_os.*.quantity_used' => 'bombas usadas da OS anterior',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 148 | `        ];` | Executa a instrução indicada pela implementação deste arquivo. |
| 149 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 150 | `}` | Executa a instrução indicada pela implementação deste arquivo. |
