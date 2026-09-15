# Documentação linha a linha — `app/Models/Entries/Agricultural/AgriculturalDefensiveOrder.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Define o namespace da entidade de lançamento de OS.` | Define o namespace da entidade de lançamento de OS. |
| 4 | `namespace App\Models\Entries\Agricultural;` | Define o namespace para organizar a classe dentro da arquitetura do projeto. |
| 5 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 6 | `// Importa o model base do Eloquent.` | Importa o model base do Eloquent. |
| 7 | `use Illuminate\Database\Eloquent\Model;` | Importa a classe ou dependência utilizada nesta implementação. |
| 8 | `// Importa a relação de um para muitos.` | Importa a relação de um para muitos. |
| 9 | `use Illuminate\Database\Eloquent\Relations\BelongsTo;` | Importa a classe ou dependência utilizada nesta implementação. |
| 10 | `// Importa a relação de muitos para muitos.` | Importa a relação de muitos para muitos. |
| 11 | `use Illuminate\Database\Eloquent\Relations\HasMany;` | Importa a classe ou dependência utilizada nesta implementação. |
| 12 | `// Importa o model de talhão.` | Importa o model de talhão. |
| 13 | `use App\Models\Registrations\Property\Areas\Field;` | Importa a classe ou dependência utilizada nesta implementação. |
| 14 | `// Importa o model de safra.` | Importa o model de safra. |
| 15 | `use App\Models\Registrations\Harvest\Crop;` | Importa a classe ou dependência utilizada nesta implementação. |
| 16 | `// Importa o model de cultura.` | Importa o model de cultura. |
| 17 | `use App\Models\Registrations\Harvest\Culture;` | Importa a classe ou dependência utilizada nesta implementação. |
| 18 | `// Importa o model de tipo de operação.` | Importa o model de tipo de operação. |
| 19 | `use App\Models\Registrations\Agricultural\TypeOperation;` | Importa a classe ou dependência utilizada nesta implementação. |
| 20 | `// Importa o model de itens de produto.` | Importa o model de itens de produto. |
| 21 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrderProduct;` | Importa a classe ou dependência utilizada nesta implementação. |
| 22 | `// Importa o model de operadores.` | Importa o model de operadores. |
| 23 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrderOperator;` | Importa a classe ou dependência utilizada nesta implementação. |
| 24 | `// Importa o model de fechamentos.` | Importa o model de fechamentos. |
| 25 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrderClosing;` | Importa a classe ou dependência utilizada nesta implementação. |
| 26 | `// Importa o model das referências anteriores.` | Importa o model das referências anteriores. |
| 27 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrderPreviousOrder;` | Importa a classe ou dependência utilizada nesta implementação. |
| 28 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 29 | `// Representa uma ordem de serviço individual para um único talhão.` | Representa uma ordem de serviço individual para um único talhão. |
| 30 | `class AgriculturalDefensiveOrder extends Model` | Declara a classe responsável pelo comportamento deste componente. |
| 31 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 32 | `    // Define explicitamente a tabela.` | Define explicitamente a tabela. |
| 33 | `    protected $table = 'agricultural_defensive_orders';` | Define explicitamente o nome da tabela usada pelo Eloquent. |
| 34 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 35 | `    // Define os campos que podem ser preenchidos em massa.` | Define os campos que podem ser preenchidos em massa. |
| 36 | `    protected $fillable = [` | Define os atributos permitidos para preenchimento em massa. |
| 37 | `        // Guarda o número público da OS.` | Guarda o número público da OS. |
| 38 | `        'os_number',` | Executa a instrução indicada pela implementação deste arquivo. |
| 39 | `        // Guarda a OS pai quando esta for uma ordem filha.` | Guarda a OS pai quando esta for uma ordem filha. |
| 40 | `        'parent_order_id',` | Executa a instrução indicada pela implementação deste arquivo. |
| 41 | `        // Guarda o único talhão da OS.` | Guarda o único talhão da OS. |
| 42 | `        'field_id',` | Executa a instrução indicada pela implementação deste arquivo. |
| 43 | `        // Guarda a área utilizada no talhão.` | Guarda a área utilizada no talhão. |
| 44 | `        'area',` | Executa a instrução indicada pela implementação deste arquivo. |
| 45 | `        // Guarda a safra.` | Guarda a safra. |
| 46 | `        'crop_id',` | Executa a instrução indicada pela implementação deste arquivo. |
| 47 | `        // Guarda a cultura.` | Guarda a cultura. |
| 48 | `        'culture_id',` | Executa a instrução indicada pela implementação deste arquivo. |
| 49 | `        // Guarda o tipo de operação.` | Guarda o tipo de operação. |
| 50 | `        'type_operation_id',` | Executa a instrução indicada pela implementação deste arquivo. |
| 51 | `        // Guarda a data da aplicação.` | Guarda a data da aplicação. |
| 52 | `        'application_date',` | Executa a instrução indicada pela implementação deste arquivo. |
| 53 | `        // Guarda o volume da bomba/tanque.` | Guarda o volume da bomba/tanque. |
| 54 | `        'pump_volume',` | Executa a instrução indicada pela implementação deste arquivo. |
| 55 | `        // Guarda as bombas recomendadas.` | Guarda as bombas recomendadas. |
| 56 | `        'recommended_pump',` | Executa a instrução indicada pela implementação deste arquivo. |
| 57 | `        // Guarda a vazão.` | Guarda a vazão. |
| 58 | `        'flow',` | Executa a instrução indicada pela implementação deste arquivo. |
| 59 | `        // Guarda a capacidade da bomba.` | Guarda a capacidade da bomba. |
| 60 | `        'pump_capacity',` | Executa a instrução indicada pela implementação deste arquivo. |
| 61 | `        // Guarda o total real acumulado de bombas.` | Guarda o total real acumulado de bombas. |
| 62 | `        'used_bomb',` | Executa a instrução indicada pela implementação deste arquivo. |
| 63 | `        // Guarda o status.` | Guarda o status. |
| 64 | `        'status',` | Executa a instrução indicada pela implementação deste arquivo. |
| 65 | `    ];` | Executa a instrução indicada pela implementação deste arquivo. |
| 66 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 67 | `    // Define os casts dos campos numéricos e de data.` | Define os casts dos campos numéricos e de data. |
| 68 | `    protected function casts(): array` | Define conversões automáticas de tipos do Eloquent. |
| 69 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 70 | `        // Retorna o mapa de tipos.` | Retorna o mapa de tipos. |
| 71 | `        return [` | Inicia a coleção de configuração, regras ou dados retornados pelo método. |
| 72 | `            // Converte área para decimal.` | Converte área para decimal. |
| 73 | `            'area' => 'decimal:3',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 74 | `            // Converte a data para o tipo de data do Laravel.` | Converte a data para o tipo de data do Laravel. |
| 75 | `            'application_date' => 'date',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 76 | `            // Converte volume para decimal.` | Converte volume para decimal. |
| 77 | `            'pump_volume' => 'decimal:3',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 78 | `            // Converte bombas recomendadas para decimal.` | Converte bombas recomendadas para decimal. |
| 79 | `            'recommended_pump' => 'decimal:4',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 80 | `            // Converte vazão para decimal.` | Converte vazão para decimal. |
| 81 | `            'flow' => 'decimal:3',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 82 | `            // Converte capacidade para decimal.` | Converte capacidade para decimal. |
| 83 | `            'pump_capacity' => 'decimal:3',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 84 | `            // Converte bombas reais para decimal.` | Converte bombas reais para decimal. |
| 85 | `            'used_bomb' => 'decimal:4',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 86 | `        ];` | Executa a instrução indicada pela implementação deste arquivo. |
| 87 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 88 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 89 | `    // Define o talhão da OS.` | Define o talhão da OS. |
| 90 | `    public function field(): BelongsTo` | Declara um método público responsável por uma operação do componente. |
| 91 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 92 | `        // Retorna a relação com Field.` | Retorna a relação com Field. |
| 93 | `        return $this->belongsTo(Field::class);` | Define um relacionamento Eloquent de muitos para um. |
| 94 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 95 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 96 | `    // Define a OS pai.` | Define a OS pai. |
| 97 | `    public function parentOrder(): BelongsTo` | Declara um método público responsável por uma operação do componente. |
| 98 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 99 | `        // Retorna a relação recursiva.` | Retorna a relação recursiva. |
| 100 | `        return $this->belongsTo(self::class, 'parent_order_id');` | Define um relacionamento Eloquent de muitos para um. |
| 101 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 102 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 103 | `    // Define as OS filhas.` | Define as OS filhas. |
| 104 | `    public function childOrders(): HasMany` | Declara um método público responsável por uma operação do componente. |
| 105 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 106 | `        // Retorna todas as ordens filhas.` | Retorna todas as ordens filhas. |
| 107 | `        return $this->hasMany(self::class, 'parent_order_id');` | Define um relacionamento Eloquent de um para muitos. |
| 108 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 109 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 110 | `    // Define a safra.` | Define a safra. |
| 111 | `    public function crop(): BelongsTo` | Declara um método público responsável por uma operação do componente. |
| 112 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 113 | `        // Retorna a relação com Crop.` | Retorna a relação com Crop. |
| 114 | `        return $this->belongsTo(Crop::class);` | Define um relacionamento Eloquent de muitos para um. |
| 115 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 116 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 117 | `    // Define a cultura.` | Define a cultura. |
| 118 | `    public function culture(): BelongsTo` | Declara um método público responsável por uma operação do componente. |
| 119 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 120 | `        // Retorna a relação com Culture.` | Retorna a relação com Culture. |
| 121 | `        return $this->belongsTo(Culture::class);` | Define um relacionamento Eloquent de muitos para um. |
| 122 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 123 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 124 | `    // Define o tipo de operação.` | Define o tipo de operação. |
| 125 | `    public function typeOperation(): BelongsTo` | Declara um método público responsável por uma operação do componente. |
| 126 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 127 | `        // Retorna a relação com TypeOperation.` | Retorna a relação com TypeOperation. |
| 128 | `        return $this->belongsTo(TypeOperation::class);` | Define um relacionamento Eloquent de muitos para um. |
| 129 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 130 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 131 | `    // Define os operadores da OS.` | Define os operadores da OS. |
| 132 | `    public function operators(): HasMany` | Declara um método público responsável por uma operação do componente. |
| 133 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 134 | `        // Retorna os registros intermediários de operadores.` | Retorna os registros intermediários de operadores. |
| 135 | `        return $this->hasMany(AgriculturalDefensiveOrderOperator::class);` | Define um relacionamento Eloquent de um para muitos. |
| 136 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 137 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 138 | `    // Define os produtos da OS.` | Define os produtos da OS. |
| 139 | `    public function products(): HasMany` | Declara um método público responsável por uma operação do componente. |
| 140 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 141 | `        // Retorna os produtos planejados/realizados.` | Retorna os produtos planejados/realizados. |
| 142 | `        return $this->hasMany(AgriculturalDefensiveOrderProduct::class);` | Define um relacionamento Eloquent de um para muitos. |
| 143 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 144 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 145 | `    // Define os fechamentos da OS.` | Define os fechamentos da OS. |
| 146 | `    public function closings(): HasMany` | Declara um método público responsável por uma operação do componente. |
| 147 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 148 | `        // Retorna o histórico de fechamentos.` | Retorna o histórico de fechamentos. |
| 149 | `        return $this->hasMany(AgriculturalDefensiveOrderClosing::class);` | Define um relacionamento Eloquent de um para muitos. |
| 150 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 151 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 152 | `    // Define as referências a ordens anteriores.` | Define as referências a ordens anteriores. |
| 153 | `    public function previousOrders(): HasMany` | Declara um método público responsável por uma operação do componente. |
| 154 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 155 | `        // Retorna as relações usadas durante a edição/reemissão.` | Retorna as relações usadas durante a edição/reemissão. |
| 156 | `        return $this->hasMany(AgriculturalDefensiveOrderPreviousOrder::class, 'order_id');` | Define um relacionamento Eloquent de um para muitos. |
| 157 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 158 | `}` | Executa a instrução indicada pela implementação deste arquivo. |
