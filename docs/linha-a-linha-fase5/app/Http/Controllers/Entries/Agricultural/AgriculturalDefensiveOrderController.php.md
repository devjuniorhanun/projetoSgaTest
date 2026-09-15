# Documentação linha a linha — `app/Http/Controllers/Entries/Agricultural/AgriculturalDefensiveOrderController.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Define o namespace do controller de lançamento.` | Define o namespace do controller de lançamento. |
| 4 | `namespace App\Http\Controllers\Entries\Agricultural;` | Define o namespace para organizar a classe dentro da arquitetura do projeto. |
| 5 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 6 | `// Importa a requisição de criação/edição.` | Importa a requisição de criação/edição. |
| 7 | `use App\Http\Requests\Entries\Agricultural\AgriculturalDefensiveOrderRequest;` | Importa a classe ou dependência utilizada nesta implementação. |
| 8 | `// Importa a requisição de fechamento.` | Importa a requisição de fechamento. |
| 9 | `use App\Http\Requests\Entries\Agricultural\AgriculturalDefensiveOrderClosingRequest;` | Importa a classe ou dependência utilizada nesta implementação. |
| 10 | `// Importa a requisição de tanque.` | Importa a requisição de tanque. |
| 11 | `use App\Http\Requests\Entries\Agricultural\OperatorTankMovementRequest;` | Importa a classe ou dependência utilizada nesta implementação. |
| 12 | `// Importa o recurso da OS.` | Importa o recurso da OS. |
| 13 | `use App\Http\Resources\Entries\Agricultural\AgriculturalDefensiveOrderResource;` | Importa a classe ou dependência utilizada nesta implementação. |
| 14 | `// Importa o recurso do tanque.` | Importa o recurso do tanque. |
| 15 | `use App\Http\Resources\Entries\Agricultural\OperatorTankResource;` | Importa a classe ou dependência utilizada nesta implementação. |
| 16 | `// Importa o model da OS.` | Importa o model da OS. |
| 17 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrder;` | Importa a classe ou dependência utilizada nesta implementação. |
| 18 | `// Importa o serviço.` | Importa o serviço. |
| 19 | `use App\Services\Entries\Agricultural\AgriculturalDefensiveOrderService;` | Importa a classe ou dependência utilizada nesta implementação. |
| 20 | `// Importa o usuário autenticado.` | Importa o usuário autenticado. |
| 21 | `use Illuminate\Http\Request;` | Importa a classe ou dependência utilizada nesta implementação. |
| 22 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 23 | `// Controla os endpoints das ordens de serviço e da execução dos tanques.` | Controla os endpoints das ordens de serviço e da execução dos tanques. |
| 24 | `class AgriculturalDefensiveOrderController` | Declara a classe responsável pelo comportamento deste componente. |
| 25 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 26 | `    // Injeta o serviço de domínio.` | Injeta o serviço de domínio. |
| 27 | `    public function __construct(private AgriculturalDefensiveOrderService $service) {}` | Declara um método público responsável por uma operação do componente. |
| 28 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 29 | `    // Lista as OS.` | Lista as OS. |
| 30 | `    public function index()` | Declara um método público responsável por uma operação do componente. |
| 31 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 32 | `        // Retorna a coleção padronizada.` | Retorna a coleção padronizada. |
| 33 | `        return AgriculturalDefensiveOrderResource::collection($this->service->list());` | Executa a instrução indicada pela implementação deste arquivo. |
| 34 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 35 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 36 | `    // Cria uma OS por talhão recebido no array fields.` | Cria uma OS por talhão recebido no array fields. |
| 37 | `    public function store(AgriculturalDefensiveOrderRequest $request)` | Declara um método público responsável por uma operação do componente. |
| 38 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 39 | `        // Cria as ordens em uma única transação.` | Cria as ordens em uma única transação. |
| 40 | `        $orders = $this->service->create($request->validated(), $request->user()?->id);` | Executa a instrução indicada pela implementação deste arquivo. |
| 41 | `        // Retorna todas as OS geradas.` | Retorna todas as OS geradas. |
| 42 | `        return response()->json(['data' => AgriculturalDefensiveOrderResource::collection(collect($orders))], 201);` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 43 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 44 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 45 | `    // Exibe uma OS.` | Exibe uma OS. |
| 46 | `    public function show(AgriculturalDefensiveOrder $order)` | Declara um método público responsável por uma operação do componente. |
| 47 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 48 | `        // Retorna a OS carregada.` | Retorna a OS carregada. |
| 49 | `        return new AgriculturalDefensiveOrderResource($this->service->find($order));` | Executa a instrução indicada pela implementação deste arquivo. |
| 50 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 51 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 52 | `    // Reemite/edita uma OS pai e cria novas filhas.` | Reemite/edita uma OS pai e cria novas filhas. |
| 53 | `    public function reissue(AgriculturalDefensiveOrder $order, AgriculturalDefensiveOrderRequest $request)` | Declara um método público responsável por uma operação do componente. |
| 54 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 55 | `        // Executa a criação das filhas com o vínculo pai.` | Executa a criação das filhas com o vínculo pai. |
| 56 | `        $children = $this->service->reissue($order, array_merge($request->validated(), ['previous_os' => $request->input('previous_os', [])]));` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 57 | `        // Retorna as filhas geradas.` | Retorna as filhas geradas. |
| 58 | `        return response()->json(['data' => AgriculturalDefensiveOrderResource::collection(collect($children))], 201);` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 59 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 60 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 61 | `    // Realiza um fechamento parcial ou final.` | Realiza um fechamento parcial ou final. |
| 62 | `    public function close(AgriculturalDefensiveOrderClosingRequest $request)` | Declara um método público responsável por uma operação do componente. |
| 63 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 64 | `        // Executa o fechamento usando o usuário autenticado.` | Executa o fechamento usando o usuário autenticado. |
| 65 | `        $order = $this->service->close($request->validated(), $request->user()?->id);` | Executa a instrução indicada pela implementação deste arquivo. |
| 66 | `        // Retorna a OS atualizada.` | Retorna a OS atualizada. |
| 67 | `        return new AgriculturalDefensiveOrderResource($order);` | Executa a instrução indicada pela implementação deste arquivo. |
| 68 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 69 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 70 | `    // Cria/consulta o tanque diário do operador.` | Cria/consulta o tanque diário do operador. |
| 71 | `    public function tank(Request $request, int $operator)` | Declara um método público responsável por uma operação do componente. |
| 72 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 73 | `        // Valida a data enviada ou usa a data atual.` | Valida a data enviada ou usa a data atual. |
| 74 | `        $date = $request->validate(['date' => ['nullable', 'date']])['date'] ?? now()->toDateString();` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 75 | `        // Obtém ou cria o tanque e copia a sobra anterior quando necessário.` | Obtém ou cria o tanque e copia a sobra anterior quando necessário. |
| 76 | `        $tank = $this->service->getOrCreateTank($operator, $date);` | Executa a instrução indicada pela implementação deste arquivo. |
| 77 | `        // Retorna o tanque.` | Retorna o tanque. |
| 78 | `        return new OperatorTankResource($tank);` | Executa a instrução indicada pela implementação deste arquivo. |
| 79 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 80 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 81 | `    // Realiza retirada ou devolução do produto.` | Realiza retirada ou devolução do produto. |
| 82 | `    public function tankMovement(OperatorTankMovementRequest $request)` | Declara um método público responsável por uma operação do componente. |
| 83 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 84 | `        // Executa a movimentação física.` | Executa a movimentação física. |
| 85 | `        $tank = $this->service->moveTank($request->validated(), $request->user()?->id);` | Executa a instrução indicada pela implementação deste arquivo. |
| 86 | `        // Retorna o tanque atualizado.` | Retorna o tanque atualizado. |
| 87 | `        return new OperatorTankResource($tank);` | Executa a instrução indicada pela implementação deste arquivo. |
| 88 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 89 | `}` | Executa a instrução indicada pela implementação deste arquivo. |
