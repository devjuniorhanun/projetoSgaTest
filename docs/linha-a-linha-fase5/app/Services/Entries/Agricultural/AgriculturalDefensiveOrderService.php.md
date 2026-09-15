# Documentação linha a linha — `app/Services/Entries/Agricultural/AgriculturalDefensiveOrderService.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `// Define o namespace do serviço de negócio das OS.` | Define o namespace do serviço de negócio das OS. |
| 4 | `namespace App\Services\Entries\Agricultural;` | Define o namespace para organizar a classe dentro da arquitetura do projeto. |
| 5 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 6 | `// Importa o model da OS.` | Importa o model da OS. |
| 7 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrder;` | Importa a classe ou dependência utilizada nesta implementação. |
| 8 | `// Importa o model do item de produto.` | Importa o model do item de produto. |
| 9 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrderProduct;` | Importa a classe ou dependência utilizada nesta implementação. |
| 10 | `// Importa o model do operador.` | Importa o model do operador. |
| 11 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrderOperator;` | Importa a classe ou dependência utilizada nesta implementação. |
| 12 | `// Importa o model da referência anterior.` | Importa o model da referência anterior. |
| 13 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrderPreviousOrder;` | Importa a classe ou dependência utilizada nesta implementação. |
| 14 | `// Importa o model do fechamento.` | Importa o model do fechamento. |
| 15 | `use App\Models\Entries\Agricultural\AgriculturalDefensiveOrderClosing;` | Importa a classe ou dependência utilizada nesta implementação. |
| 16 | `// Importa o model do tanque.` | Importa o model do tanque. |
| 17 | `use App\Models\Entries\Agricultural\OperatorTank;` | Importa a classe ou dependência utilizada nesta implementação. |
| 18 | `// Importa o model do produto no tanque.` | Importa o model do produto no tanque. |
| 19 | `use App\Models\Entries\Agricultural\OperatorTankProduct;` | Importa a classe ou dependência utilizada nesta implementação. |
| 20 | `// Importa o model de movimento do tanque.` | Importa o model de movimento do tanque. |
| 21 | `use App\Models\Entries\Agricultural\OperatorTankMovement;` | Importa a classe ou dependência utilizada nesta implementação. |
| 22 | `// Importa o model de movimento de estoque.` | Importa o model de movimento de estoque. |
| 23 | `use App\Models\Entries\Agricultural\ProductStockMovement;` | Importa a classe ou dependência utilizada nesta implementação. |
| 24 | `// Importa o talhão.` | Importa o talhão. |
| 25 | `use App\Models\Registrations\Property\Areas\Field;` | Importa a classe ou dependência utilizada nesta implementação. |
| 26 | `// Importa o produto cadastrado.` | Importa o produto cadastrado. |
| 27 | `use App\Models\Registrations\Product\Product;` | Importa a classe ou dependência utilizada nesta implementação. |
| 28 | `// Importa o DB para transações e bloqueios.` | Importa o DB para transações e bloqueios. |
| 29 | `use Illuminate\Support\Facades\DB;` | Importa a classe ou dependência utilizada nesta implementação. |
| 30 | `// Importa o Carbon para datas.` | Importa o Carbon para datas. |
| 31 | `use Carbon\Carbon;` | Importa a classe ou dependência utilizada nesta implementação. |
| 32 | `// Importa exceção de regra de negócio.` | Importa exceção de regra de negócio. |
| 33 | `use RuntimeException;` | Importa a classe ou dependência utilizada nesta implementação. |
| 34 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 35 | `// Centraliza todas as regras da operação de lançamento, execução e estoque.` | Centraliza todas as regras da operação de lançamento, execução e estoque. |
| 36 | `class AgriculturalDefensiveOrderService` | Declara a classe responsável pelo comportamento deste componente. |
| 37 | `{` | Executa a instrução indicada pela implementação deste arquivo. |
| 38 | `    // Lista as OS mais recentes com os relacionamentos principais.` | Lista as OS mais recentes com os relacionamentos principais. |
| 39 | `    public function list()` | Declara um método público responsável por uma operação do componente. |
| 40 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 41 | `        // Consulta as OS em ordem decrescente.` | Consulta as OS em ordem decrescente. |
| 42 | `        return AgriculturalDefensiveOrder::query()` | Executa a instrução indicada pela implementação deste arquivo. |
| 43 | `            // Carrega os dados necessários para o frontend.` | Carrega os dados necessários para o frontend. |
| 44 | `            ->with(['field', 'crop', 'culture', 'typeOperation', 'products.product', 'operators.operator', 'operators.fleet', 'closings'])` | Executa a instrução indicada pela implementação deste arquivo. |
| 45 | `            // Ordena pelas mais recentes.` | Ordena pelas mais recentes. |
| 46 | `            ->orderByDesc('id')` | Executa a instrução indicada pela implementação deste arquivo. |
| 47 | `            // Retorna os registros.` | Retorna os registros. |
| 48 | `            ->get();` | Executa a instrução indicada pela implementação deste arquivo. |
| 49 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 50 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 51 | `    // Busca uma OS pelo ID.` | Busca uma OS pelo ID. |
| 52 | `    public function find(AgriculturalDefensiveOrder $order): AgriculturalDefensiveOrder` | Declara um método público responsável por uma operação do componente. |
| 53 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 54 | `        // Recarrega a OS com todas as relações úteis.` | Recarrega a OS com todas as relações úteis. |
| 55 | `        return $order->load(['field', 'crop', 'culture', 'typeOperation', 'products.product', 'operators.operator', 'operators.fleet', 'closings', 'childOrders', 'previousOrders.previousOrder']);` | Executa a instrução indicada pela implementação deste arquivo. |
| 56 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 57 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 58 | `    // Cria uma OS para cada talhão recebido pelo frontend.` | Cria uma OS para cada talhão recebido pelo frontend. |
| 59 | `    public function create(array $data, ?int $userId = null): array` | Declara um método público responsável por uma operação do componente. |
| 60 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 61 | `        // Inicia uma transação para que todas as OS sejam criadas juntas.` | Inicia uma transação para que todas as OS sejam criadas juntas. |
| 62 | `        return DB::transaction(function () use ($data, $userId): array {` | Executa o bloco dentro de uma transação para garantir consistência. |
| 63 | `            // Cria a lista de OS geradas.` | Cria a lista de OS geradas. |
| 64 | `            $orders = [];` | Executa a instrução indicada pela implementação deste arquivo. |
| 65 | `            // Percorre todos os talhões enviados pelo frontend.` | Percorre todos os talhões enviados pelo frontend. |
| 66 | `            foreach ($data['fields'] as $fieldData) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 67 | `                // Cria uma OS individual para o talhão atual.` | Cria uma OS individual para o talhão atual. |
| 68 | `                $orders[] = $this->createSingleOrder($data, $fieldData, null);` | Executa a instrução indicada pela implementação deste arquivo. |
| 69 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 70 | `            // Retorna todas as OS criadas.` | Retorna todas as OS criadas. |
| 71 | `            return array_map(fn (AgriculturalDefensiveOrder $order) => $this->find($order), $orders);` | Executa a instrução indicada pela implementação deste arquivo. |
| 72 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 73 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 74 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 75 | `    // Cria uma única OS para um único talhão.` | Cria uma única OS para um único talhão. |
| 76 | `    private function createSingleOrder(array $data, array $fieldData, ?int $parentOrderId): AgriculturalDefensiveOrder` | Declara um método privado usado internamente pela regra de negócio. |
| 77 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 78 | `        // Bloqueia o talhão durante a validação da área para evitar corrida concorrente.` | Bloqueia o talhão durante a validação da área para evitar corrida concorrente. |
| 79 | `        $field = Field::query()->lockForUpdate()->findOrFail($fieldData['field_id']);` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 80 | `        // Converte a área informada para número decimal.` | Converte a área informada para número decimal. |
| 81 | `        $requestedArea = (float) $fieldData['area'];` | Executa a instrução indicada pela implementação deste arquivo. |
| 82 | `        // Calcula a área já comprometida por outras OS do mesmo talhão.` | Calcula a área já comprometida por outras OS do mesmo talhão. |
| 83 | `        $usedArea = (float) AgriculturalDefensiveOrder::query()->where('field_id', $field->id)->whereIn('status', ['A'])->sum('area');` | Monta uma consulta Eloquent para localizar registros. |
| 84 | `        // Calcula a área que ainda está disponível.` | Calcula a área que ainda está disponível. |
| 85 | `        $availableArea = (float) $field->area - $usedArea;` | Executa a instrução indicada pela implementação deste arquivo. |
| 86 | `        // Impede que o frontend ultrapasse a área disponível real.` | Impede que o frontend ultrapasse a área disponível real. |
| 87 | `        if ($requestedArea > $availableArea + 0.0000001) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 88 | `            throw new RuntimeException("A área solicitada para o talhão {$field->name} excede a área disponível de {$availableArea}.");` | Interrompe a operação quando uma regra de negócio é violada. |
| 89 | `        }` | Executa a instrução indicada pela implementação deste arquivo. |
| 90 | `        // Cria a OS sem número para que o ID possa definir o número de forma segura.` | Cria a OS sem número para que o ID possa definir o número de forma segura. |
| 91 | `        $order = AgriculturalDefensiveOrder::create([` | Cria e persiste um novo registro. |
| 92 | `            // O número será definido imediatamente após a criação.` | O número será definido imediatamente após a criação. |
| 93 | `            'os_number' => null,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 94 | `            // Guarda a OS pai quando existir.` | Guarda a OS pai quando existir. |
| 95 | `            'parent_order_id' => $parentOrderId,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 96 | `            // Guarda o único talhão.` | Guarda o único talhão. |
| 97 | `            'field_id' => $field->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 98 | `            // Guarda a área solicitada.` | Guarda a área solicitada. |
| 99 | `            'area' => $requestedArea,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 100 | `            // Copia os dados gerais da solicitação.` | Copia os dados gerais da solicitação. |
| 101 | `            'crop_id' => $data['crop_id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 102 | `            // Copia a cultura.` | Copia a cultura. |
| 103 | `            'culture_id' => $data['culture_id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 104 | `            // Copia a operação.` | Copia a operação. |
| 105 | `            'type_operation_id' => $data['type_operation_id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 106 | `            // Copia a data.` | Copia a data. |
| 107 | `            'application_date' => $data['application_date'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 108 | `            // Copia o volume.` | Copia o volume. |
| 109 | `            'pump_volume' => $data['pump_volume'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 110 | `            // Copia as bombas recomendadas.` | Copia as bombas recomendadas. |
| 111 | `            'recommended_pump' => $data['recommended_pump'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 112 | `            // Copia a vazão.` | Copia a vazão. |
| 113 | `            'flow' => $data['flow'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 114 | `            // Copia a capacidade.` | Copia a capacidade. |
| 115 | `            'pump_capacity' => $data['pump_capacity'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 116 | `            // Inicia as bombas reais em zero.` | Inicia as bombas reais em zero. |
| 117 | `            'used_bomb' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 118 | `            // Usa o status informado ou ativo.` | Usa o status informado ou ativo. |
| 119 | `            'status' => $data['status'] ?? 'A',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 120 | `        ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 121 | `        // Usa o ID auto incrementável como número público da OS, evitando colisões.` | Usa o ID auto incrementável como número público da OS, evitando colisões. |
| 122 | `        $order->update(['os_number' => $order->id]);` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 123 | `        // Registra os operadores.` | Registra os operadores. |
| 124 | `        foreach ($data['operators'] as $operator) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 125 | `            // Cria a participação do operador.` | Cria a participação do operador. |
| 126 | `            AgriculturalDefensiveOrderOperator::create([` | Cria e persiste um novo registro. |
| 127 | `                // Liga à OS.` | Liga à OS. |
| 128 | `                'agricultural_defensive_order_id' => $order->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 129 | `                // Liga ao operador.` | Liga ao operador. |
| 130 | `                'operator_id' => $operator['operator_id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 131 | `                // Liga à frota quando informada.` | Liga à frota quando informada. |
| 132 | `                'fleet_id' => $operator['fleet_id'] ?? null,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 133 | `                // Guarda a função.` | Guarda a função. |
| 134 | `                'function' => $operator['function'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 135 | `            ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 136 | `        }` | Executa a instrução indicada pela implementação deste arquivo. |
| 137 | `        // Registra os produtos planejados.` | Registra os produtos planejados. |
| 138 | `        foreach ($data['products'] as $productData) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 139 | `            // Cria o item da OS.` | Cria o item da OS. |
| 140 | `            AgriculturalDefensiveOrderProduct::create([` | Cria e persiste um novo registro. |
| 141 | `                // Liga à OS.` | Liga à OS. |
| 142 | `                'agricultural_defensive_order_id' => $order->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 143 | `                // Liga ao produto.` | Liga ao produto. |
| 144 | `                'product_id' => $productData['product_id'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 145 | `                // Preserva a dose recomendada/histórica.` | Preserva a dose recomendada/histórica. |
| 146 | `                'dose' => $productData['dose'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 147 | `                // Preserva a quantidade recomendada por bomba.` | Preserva a quantidade recomendada por bomba. |
| 148 | `                'pump' => $productData['pump'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 149 | `                // Ainda não há bombas reais utilizadas.` | Ainda não há bombas reais utilizadas. |
| 150 | `                'used_bomb' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 151 | `                // Calcula a quantidade recomendada para a OS.` | Calcula a quantidade recomendada para a OS. |
| 152 | `                'recommended_quantity' => (float) $productData['pump'] * (float) $data['recommended_pump'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 153 | `                // Ainda não há consumo real.` | Ainda não há consumo real. |
| 154 | `                'actual_quantity' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 155 | `                // Mantém a dose real vazia até a execução.` | Mantém a dose real vazia até a execução. |
| 156 | `                'actual_dose' => null,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 157 | `            ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 158 | `        }` | Executa a instrução indicada pela implementação deste arquivo. |
| 159 | `        // Retorna a OS criada.` | Retorna a OS criada. |
| 160 | `        return $order->refresh();` | Executa a instrução indicada pela implementação deste arquivo. |
| 161 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 162 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 163 | `    // Cria ordens filhas durante uma edição/reemissão.` | Cria ordens filhas durante uma edição/reemissão. |
| 164 | `    public function reissue(AgriculturalDefensiveOrder $parent, array $data): array` | Declara um método público responsável por uma operação do componente. |
| 165 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 166 | `        // Executa tudo em uma transação.` | Executa tudo em uma transação. |
| 167 | `        return DB::transaction(function () use ($parent, $data): array {` | Executa o bloco dentro de uma transação para garantir consistência. |
| 168 | `            // Bloqueia a OS pai durante a operação.` | Bloqueia a OS pai durante a operação. |
| 169 | `            $parent = AgriculturalDefensiveOrder::query()->lockForUpdate()->findOrFail($parent->id);` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 170 | `            // Cria uma lista de filhas.` | Cria uma lista de filhas. |
| 171 | `            $children = [];` | Executa a instrução indicada pela implementação deste arquivo. |
| 172 | `            // O array fields continua sendo a seleção do frontend.` | O array fields continua sendo a seleção do frontend. |
| 173 | `            foreach ($data['fields'] as $fieldData) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 174 | `                // Cria uma nova OS filha para cada talhão selecionado.` | Cria uma nova OS filha para cada talhão selecionado. |
| 175 | `                $child = $this->createSingleOrder($data, $fieldData, $parent->id);` | Executa a instrução indicada pela implementação deste arquivo. |
| 176 | `                // Percorre as OS antigas informadas na edição.` | Percorre as OS antigas informadas na edição. |
| 177 | `                foreach ($data['previous_os'] ?? [] as $previous) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 178 | `                    // Localiza a OS antiga pelo número público.` | Localiza a OS antiga pelo número público. |
| 179 | `                    $previousOrder = AgriculturalDefensiveOrder::query()->where('os_number', $previous['os_number'])->lockForUpdate()->first();` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 180 | `                    // Interrompe se a OS informada não existir.` | Interrompe se a OS informada não existir. |
| 181 | `                    if (!$previousOrder) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 182 | `                        throw new RuntimeException("A OS anterior {$previous['os_number']} não foi encontrada.");` | Interrompe a operação quando uma regra de negócio é violada. |
| 183 | `                    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 184 | `                    // Registra a ligação da filha com a OS anterior.` | Registra a ligação da filha com a OS anterior. |
| 185 | `                    AgriculturalDefensiveOrderPreviousOrder::create([` | Cria e persiste um novo registro. |
| 186 | `                        // Guarda a nova filha.` | Guarda a nova filha. |
| 187 | `                        'order_id' => $child->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 188 | `                        // Guarda a OS anterior.` | Guarda a OS anterior. |
| 189 | `                        'previous_order_id' => $previousOrder->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 190 | `                        // Guarda as bombas utilizadas da OS anterior.` | Guarda as bombas utilizadas da OS anterior. |
| 191 | `                        'quantity_used' => $previous['quantity_used'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 192 | `                    ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 193 | `                }` | Executa a instrução indicada pela implementação deste arquivo. |
| 194 | `                // Adiciona a filha à resposta.` | Adiciona a filha à resposta. |
| 195 | `                $children[] = $child;` | Executa a instrução indicada pela implementação deste arquivo. |
| 196 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 197 | `            // Retorna as filhas completas.` | Retorna as filhas completas. |
| 198 | `            return array_map(fn (AgriculturalDefensiveOrder $order) => $this->find($order), $children);` | Executa a instrução indicada pela implementação deste arquivo. |
| 199 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 200 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 201 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 202 | `    // Realiza um fechamento parcial ou final e consome o tanque.` | Realiza um fechamento parcial ou final e consome o tanque. |
| 203 | `    public function close(array $data, ?int $userId = null): AgriculturalDefensiveOrder` | Declara um método público responsável por uma operação do componente. |
| 204 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 205 | `        // Executa o fechamento em transação.` | Executa o fechamento em transação. |
| 206 | `        return DB::transaction(function () use ($data, $userId): AgriculturalDefensiveOrder {` | Executa o bloco dentro de uma transação para garantir consistência. |
| 207 | `            // Bloqueia a OS para impedir dois fechamentos concorrentes.` | Bloqueia a OS para impedir dois fechamentos concorrentes. |
| 208 | `            $order = AgriculturalDefensiveOrder::query()->where('os_number', $data['os_number'])->lockForUpdate()->firstOrFail();` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 209 | `            // Bloqueia o tanque usado no fechamento.` | Bloqueia o tanque usado no fechamento. |
| 210 | `            $tank = OperatorTank::query()->lockForUpdate()->findOrFail($data['operator_tank_id']);` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 211 | `            // Garante que o tanque esteja na mesma data operacional da OS.` | Garante que o tanque esteja na mesma data operacional da OS. |
| 212 | `            if ($tank->date->format('Y-m-d') !== $order->application_date->format('Y-m-d')) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 213 | `                throw new RuntimeException('O tanque do operador deve pertencer à mesma data da OS.');` | Interrompe a operação quando uma regra de negócio é violada. |
| 214 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 215 | `            // Calcula o novo total real de bombas.` | Calcula o novo total real de bombas. |
| 216 | `            $newUsedBomb = (float) $order->used_bomb + (float) $data['closing_bomb'];` | Executa a instrução indicada pela implementação deste arquivo. |
| 217 | `            // Impede ultrapassar a quantidade recomendada.` | Impede ultrapassar a quantidade recomendada. |
| 218 | `            if ($newUsedBomb > (float) $order->recommended_pump + 0.0000001) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 219 | `                throw new RuntimeException('A quantidade real de bombas não pode ultrapassar a quantidade recomendada da OS.');` | Interrompe a operação quando uma regra de negócio é violada. |
| 220 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 221 | `            // Cria o registro histórico do fechamento.` | Cria o registro histórico do fechamento. |
| 222 | `            $closing = AgriculturalDefensiveOrderClosing::create([` | Cria e persiste um novo registro. |
| 223 | `                // Liga à OS.` | Liga à OS. |
| 224 | `                'agricultural_defensive_order_id' => $order->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 225 | `                // Liga ao tanque.` | Liga ao tanque. |
| 226 | `                'operator_tank_id' => $tank->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 227 | `                // Guarda somente as bombas deste evento.` | Guarda somente as bombas deste evento. |
| 228 | `                'closing_bomb' => $data['closing_bomb'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 229 | `                // Guarda o tipo.` | Guarda o tipo. |
| 230 | `                'closing_type' => $data['closing_type'],` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 231 | `                // Guarda a data/hora.` | Guarda a data/hora. |
| 232 | `                'closed_at' => Carbon::now(),` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 233 | `                // Guarda o usuário.` | Guarda o usuário. |
| 234 | `                'created_by' => $userId,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 235 | `            ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 236 | `            // Atualiza cada produto da OS com o total real acumulado.` | Atualiza cada produto da OS com o total real acumulado. |
| 237 | `            foreach ($order->products()->lockForUpdate()->get() as $item) {` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 238 | `                // Bloqueia o saldo do produto no tanque.` | Bloqueia o saldo do produto no tanque. |
| 239 | `                $tankProduct = OperatorTankProduct::query()->where('operator_tank_id', $tank->id)->where('product_id', $item->product_id)->lockForUpdate()->first();` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 240 | `                // Exige que o produto esteja no tanque antes do consumo.` | Exige que o produto esteja no tanque antes do consumo. |
| 241 | `                if (!$tankProduct) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 242 | `                    throw new RuntimeException("O produto {$item->product_id} não possui saldo no tanque do operador.");` | Interrompe a operação quando uma regra de negócio é violada. |
| 243 | `                }` | Executa a instrução indicada pela implementação deste arquivo. |
| 244 | `                // Calcula o consumo real deste produto usando as bombas reais e o pump registrado.` | Calcula o consumo real deste produto usando as bombas reais e o pump registrado. |
| 245 | `                $actualQuantity = (float) $item->pump * $newUsedBomb;` | Executa a instrução indicada pela implementação deste arquivo. |
| 246 | `                // Calcula o consumo que já havia sido reconhecido em fechamentos anteriores.` | Calcula o consumo que já havia sido reconhecido em fechamentos anteriores. |
| 247 | `                $previousQuantity = (float) $item->actual_quantity;` | Executa a instrução indicada pela implementação deste arquivo. |
| 248 | `                // Obtém somente a diferença consumida neste fechamento.` | Obtém somente a diferença consumida neste fechamento. |
| 249 | `                $increment = $actualQuantity - $previousQuantity;` | Executa a instrução indicada pela implementação deste arquivo. |
| 250 | `                // Impede consumo negativo por inconsistência.` | Impede consumo negativo por inconsistência. |
| 251 | `                if ($increment < -0.0000001) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 252 | `                    throw new RuntimeException('O consumo calculado não pode diminuir entre fechamentos.');` | Interrompe a operação quando uma regra de negócio é violada. |
| 253 | `                }` | Executa a instrução indicada pela implementação deste arquivo. |
| 254 | `                // Verifica saldo suficiente no tanque.` | Verifica saldo suficiente no tanque. |
| 255 | `                if ((float) $tankProduct->current_quantity < $increment - 0.0000001) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 256 | `                    throw new RuntimeException("Saldo insuficiente do produto {$item->product_id} no tanque.");` | Interrompe a operação quando uma regra de negócio é violada. |
| 257 | `                }` | Executa a instrução indicada pela implementação deste arquivo. |
| 258 | `                // Atualiza o item da OS com o total real.` | Atualiza o item da OS com o total real. |
| 259 | `                $item->update([` | Atualiza o registro persistido no banco. |
| 260 | `                    // Guarda as bombas reais acumuladas.` | Guarda as bombas reais acumuladas. |
| 261 | `                    'used_bomb' => $newUsedBomb,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 262 | `                    // Mantém a dose como histórico e também registra a dose real.` | Mantém a dose como histórico e também registra a dose real. |
| 263 | `                    'actual_dose' => $item->dose,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 264 | `                    // Guarda o total real calculado.` | Guarda o total real calculado. |
| 265 | `                    'actual_quantity' => $actualQuantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 266 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 267 | `                // Atualiza o saldo do tanque.` | Atualiza o saldo do tanque. |
| 268 | `                $tankProduct->update([` | Atualiza o registro persistido no banco. |
| 269 | `                    // Soma somente o consumo deste fechamento.` | Soma somente o consumo deste fechamento. |
| 270 | `                    'used_quantity' => (float) $tankProduct->used_quantity + $increment,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 271 | `                    // Diminui somente o consumo deste fechamento.` | Diminui somente o consumo deste fechamento. |
| 272 | `                    'current_quantity' => (float) $tankProduct->current_quantity - $increment,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 273 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 274 | `                // Registra a movimentação física do tanque.` | Registra a movimentação física do tanque. |
| 275 | `                OperatorTankMovement::create([` | Cria e persiste um novo registro. |
| 276 | `                    // Liga ao tanque.` | Liga ao tanque. |
| 277 | `                    'operator_tank_id' => $tank->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 278 | `                    // Liga ao produto.` | Liga ao produto. |
| 279 | `                    'product_id' => $item->product_id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 280 | `                    // Liga ao fechamento.` | Liga ao fechamento. |
| 281 | `                    'closing_id' => $closing->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 282 | `                    // Liga à OS.` | Liga à OS. |
| 283 | `                    'order_id' => $order->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 284 | `                    // Define o movimento como consumo.` | Define o movimento como consumo. |
| 285 | `                    'movement_type' => 'USAGE',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 286 | `                    // Guarda somente a quantidade deste fechamento.` | Guarda somente a quantidade deste fechamento. |
| 287 | `                    'quantity' => $increment,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 288 | `                    // Descreve a origem.` | Descreve a origem. |
| 289 | `                    'observation' => 'Consumo de produto no fechamento da OS.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 290 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 291 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 292 | `            // Atualiza o total real de bombas da OS.` | Atualiza o total real de bombas da OS. |
| 293 | `            $order->update(['used_bomb' => $newUsedBomb]);` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 294 | `            // Se for fechamento final, exige que o total recomendado tenha sido alcançado.` | Se for fechamento final, exige que o total recomendado tenha sido alcançado. |
| 295 | `            if ($data['closing_type'] === 'FINAL' && abs($newUsedBomb - (float) $order->recommended_pump) > 0.0001) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 296 | `                throw new RuntimeException('O fechamento final exige que as bombas utilizadas sejam iguais às bombas recomendadas.');` | Interrompe a operação quando uma regra de negócio é violada. |
| 297 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 298 | `            // Se for final, marca a OS como concluída.` | Se for final, marca a OS como concluída. |
| 299 | `            if ($data['closing_type'] === 'FINAL') {` | Executa a instrução indicada pela implementação deste arquivo. |
| 300 | `                $order->update(['status' => 'I']);` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 301 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 302 | `            // Retorna a OS atualizada.` | Retorna a OS atualizada. |
| 303 | `            return $this->find($order->refresh());` | Executa a instrução indicada pela implementação deste arquivo. |
| 304 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 305 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 306 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 307 | `    // Obtém ou cria o tanque diário e traz o saldo do dia anterior.` | Obtém ou cria o tanque diário e traz o saldo do dia anterior. |
| 308 | `    public function getOrCreateTank(int $operatorId, string $date): OperatorTank` | Declara um método público responsável por uma operação do componente. |
| 309 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 310 | `        // Executa a criação com proteção contra concorrência.` | Executa a criação com proteção contra concorrência. |
| 311 | `        return DB::transaction(function () use ($operatorId, $date): OperatorTank {` | Executa o bloco dentro de uma transação para garantir consistência. |
| 312 | `            // Procura o tanque existente.` | Procura o tanque existente. |
| 313 | `            $tank = OperatorTank::query()->where('operator_id', $operatorId)->whereDate('date', $date)->lockForUpdate()->first();` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 314 | `            // Retorna o tanque existente.` | Retorna o tanque existente. |
| 315 | `            if ($tank) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 316 | `                return $tank->load('products.product', 'operator');` | Executa a instrução indicada pela implementação deste arquivo. |
| 317 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 318 | `            // Cria o tanque do dia.` | Cria o tanque do dia. |
| 319 | `            $tank = OperatorTank::create(['operator_id' => $operatorId, 'date' => $date, 'status' => 'A']);` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 320 | `            // Procura o tanque imediatamente anterior.` | Procura o tanque imediatamente anterior. |
| 321 | `            $previousTank = OperatorTank::query()->where('operator_id', $operatorId)->whereDate('date', '<', $date)->orderByDesc('date')->first();` | Monta uma consulta Eloquent para localizar registros. |
| 322 | `            // Copia as sobras do tanque anterior para o saldo inicial.` | Copia as sobras do tanque anterior para o saldo inicial. |
| 323 | `            if ($previousTank) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 324 | `                // Carrega os produtos anteriores.` | Carrega os produtos anteriores. |
| 325 | `                foreach ($previousTank->products()->get() as $previousProduct) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 326 | `                    // Só cria saldos positivos.` | Só cria saldos positivos. |
| 327 | `                    if ((float) $previousProduct->current_quantity > 0) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 328 | `                        // Cria a linha do produto no novo dia.` | Cria a linha do produto no novo dia. |
| 329 | `                        OperatorTankProduct::create([` | Cria e persiste um novo registro. |
| 330 | `                            // Liga ao novo tanque.` | Liga ao novo tanque. |
| 331 | `                            'operator_tank_id' => $tank->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 332 | `                            // Liga ao produto.` | Liga ao produto. |
| 333 | `                            'product_id' => $previousProduct->product_id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 334 | `                            // Registra a sobra como abertura.` | Registra a sobra como abertura. |
| 335 | `                            'opening_quantity' => $previousProduct->current_quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 336 | `                            // Não houve retirada ainda.` | Não houve retirada ainda. |
| 337 | `                            'withdrawn_quantity' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 338 | `                            // Não houve uso ainda.` | Não houve uso ainda. |
| 339 | `                            'used_quantity' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 340 | `                            // Não houve devolução ainda.` | Não houve devolução ainda. |
| 341 | `                            'returned_quantity' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 342 | `                            // Inicia o saldo com a sobra anterior.` | Inicia o saldo com a sobra anterior. |
| 343 | `                            'current_quantity' => $previousProduct->current_quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 344 | `                        ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 345 | `                    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 346 | `                }` | Executa a instrução indicada pela implementação deste arquivo. |
| 347 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 348 | `            // Retorna o tanque com dados completos.` | Retorna o tanque com dados completos. |
| 349 | `            return $tank->load('products.product', 'operator');` | Executa a instrução indicada pela implementação deste arquivo. |
| 350 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 351 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 352 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 353 | `    // Resolve a quantidade da movimentação.` | Resolve a quantidade da movimentação. |
| 354 | `    private function resolveMovementQuantity(array $data): float` | Declara um método privado usado internamente pela regra de negócio. |
| 355 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 356 | `        // Usa a quantidade explicitamente informada quando presente.` | Usa a quantidade explicitamente informada quando presente. |
| 357 | `        if (isset($data['quantity']) && $data['quantity'] !== null) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 358 | `            return (float) $data['quantity'];` | Executa a instrução indicada pela implementação deste arquivo. |
| 359 | `        }` | Executa a instrução indicada pela implementação deste arquivo. |
| 360 | `        // Exige uma OS para calcular automaticamente a retirada recomendada.` | Exige uma OS para calcular automaticamente a retirada recomendada. |
| 361 | `        if (empty($data['order_id'])) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 362 | `            throw new RuntimeException('Informe a quantidade ou uma ordem de serviço para cálculo automático.');` | Interrompe a operação quando uma regra de negócio é violada. |
| 363 | `        }` | Executa a instrução indicada pela implementação deste arquivo. |
| 364 | `        // Localiza a OS.` | Localiza a OS. |
| 365 | `        $order = AgriculturalDefensiveOrder::query()->findOrFail($data['order_id']);` | Executa a instrução indicada pela implementação deste arquivo. |
| 366 | `        // Localiza o produto da OS.` | Localiza o produto da OS. |
| 367 | `        $item = $order->products()->where('product_id', $data['product_id'])->first();` | Monta uma consulta Eloquent para localizar registros. |
| 368 | `        // Exige que o produto esteja associado à OS.` | Exige que o produto esteja associado à OS. |
| 369 | `        if (!$item) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 370 | `            throw new RuntimeException('O produto informado não pertence à ordem de serviço.');` | Interrompe a operação quando uma regra de negócio é violada. |
| 371 | `        }` | Executa a instrução indicada pela implementação deste arquivo. |
| 372 | `        // A retirada recomendada segue a regra: pump × recommended_pump.` | A retirada recomendada segue a regra: pump × recommended_pump. |
| 373 | `        return (float) $item->pump * (float) $order->recommended_pump;` | Executa a instrução indicada pela implementação deste arquivo. |
| 374 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 375 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 376 | `    // Retira produto do estoque e coloca no tanque do operador.` | Retira produto do estoque e coloca no tanque do operador. |
| 377 | `    public function moveTank(array $data, ?int $userId = null): OperatorTank` | Declara um método público responsável por uma operação do componente. |
| 378 | `    {` | Executa a instrução indicada pela implementação deste arquivo. |
| 379 | `        // Executa a movimentação em transação.` | Executa a movimentação em transação. |
| 380 | `        return DB::transaction(function () use ($data, $userId): OperatorTank {` | Executa o bloco dentro de uma transação para garantir consistência. |
| 381 | `            // Bloqueia o tanque.` | Bloqueia o tanque. |
| 382 | `            $tank = OperatorTank::query()->lockForUpdate()->findOrFail($data['operator_tank_id']);` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 383 | `            // Bloqueia o produto para impedir corrida no estoque.` | Bloqueia o produto para impedir corrida no estoque. |
| 384 | `            $product = Product::query()->lockForUpdate()->findOrFail($data['product_id']);` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 385 | `            // Calcula automaticamente a retirada recomendada quando uma OS foi informada.` | Calcula automaticamente a retirada recomendada quando uma OS foi informada. |
| 386 | `            $quantity = $this->resolveMovementQuantity($data);` | Executa a instrução indicada pela implementação deste arquivo. |
| 387 | `            // Procura ou cria a linha do produto no tanque.` | Procura ou cria a linha do produto no tanque. |
| 388 | `            $tankProduct = OperatorTankProduct::query()->where('operator_tank_id', $tank->id)->where('product_id', $product->id)->lockForUpdate()->first();` | Bloqueia o registro durante a transação para evitar concorrência incorreta. |
| 389 | `            // Cria a linha quando o produto ainda não existe no tanque.` | Cria a linha quando o produto ainda não existe no tanque. |
| 390 | `            if (!$tankProduct) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 391 | `                $tankProduct = OperatorTankProduct::create([` | Cria e persiste um novo registro. |
| 392 | `                    // Liga ao tanque.` | Liga ao tanque. |
| 393 | `                    'operator_tank_id' => $tank->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 394 | `                    // Liga ao produto.` | Liga ao produto. |
| 395 | `                    'product_id' => $product->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 396 | `                    // Não há sobra anterior.` | Não há sobra anterior. |
| 397 | `                    'opening_quantity' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 398 | `                    // Inicia retirada.` | Inicia retirada. |
| 399 | `                    'withdrawn_quantity' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 400 | `                    // Inicia uso.` | Inicia uso. |
| 401 | `                    'used_quantity' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 402 | `                    // Inicia devolução.` | Inicia devolução. |
| 403 | `                    'returned_quantity' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 404 | `                    // Inicia saldo.` | Inicia saldo. |
| 405 | `                    'current_quantity' => 0,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 406 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 407 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 408 | `            // Processa retirada do estoque.` | Processa retirada do estoque. |
| 409 | `            if ($data['movement_type'] === 'WITHDRAWAL') {` | Executa a instrução indicada pela implementação deste arquivo. |
| 410 | `                // Exige estoque suficiente.` | Exige estoque suficiente. |
| 411 | `                if ((float) ($product->stock ?? 0) < $quantity - 0.0000001) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 412 | `                    throw new RuntimeException("Estoque insuficiente para o produto {$product->id}.");` | Interrompe a operação quando uma regra de negócio é violada. |
| 413 | `                }` | Executa a instrução indicada pela implementação deste arquivo. |
| 414 | `                // Guarda o estoque anterior.` | Guarda o estoque anterior. |
| 415 | `                $before = (float) ($product->stock ?? 0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 416 | `                // Calcula o estoque posterior.` | Calcula o estoque posterior. |
| 417 | `                $after = $before - $quantity;` | Executa a instrução indicada pela implementação deste arquivo. |
| 418 | `                // Atualiza o estoque.` | Atualiza o estoque. |
| 419 | `                $product->update(['stock' => $after]);` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 420 | `                // Atualiza o tanque.` | Atualiza o tanque. |
| 421 | `                $tankProduct->update([` | Atualiza o registro persistido no banco. |
| 422 | `                    // Soma a retirada do dia.` | Soma a retirada do dia. |
| 423 | `                    'withdrawn_quantity' => (float) $tankProduct->withdrawn_quantity + $quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 424 | `                    // Soma ao saldo.` | Soma ao saldo. |
| 425 | `                    'current_quantity' => (float) $tankProduct->current_quantity + $quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 426 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 427 | `                // Registra a saída do estoque.` | Registra a saída do estoque. |
| 428 | `                ProductStockMovement::create([` | Cria e persiste um novo registro. |
| 429 | `                    // Produto.` | Produto. |
| 430 | `                    'product_id' => $product->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 431 | `                    // OS opcional.` | OS opcional. |
| 432 | `                    'order_id' => $data['order_id'] ?? null,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 433 | `                    // Tanque.` | Tanque. |
| 434 | `                    'operator_tank_id' => $tank->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 435 | `                    // Tipo.` | Tipo. |
| 436 | `                    'movement_type' => 'WITHDRAWAL_TO_TANK',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 437 | `                    // Quantidade.` | Quantidade. |
| 438 | `                    'quantity' => $quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 439 | `                    // Antes.` | Antes. |
| 440 | `                    'stock_before' => $before,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 441 | `                    // Depois.` | Depois. |
| 442 | `                    'stock_after' => $after,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 443 | `                    // Observação.` | Observação. |
| 444 | `                    'observation' => $data['observation'] ?? 'Retirada do estoque para tanque de operador.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 445 | `                    // Usuário.` | Usuário. |
| 446 | `                    'created_by' => $userId,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 447 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 448 | `                // Registra a entrada no tanque.` | Registra a entrada no tanque. |
| 449 | `                OperatorTankMovement::create([` | Cria e persiste um novo registro. |
| 450 | `                    // Tanque.` | Tanque. |
| 451 | `                    'operator_tank_id' => $tank->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 452 | `                    // Produto.` | Produto. |
| 453 | `                    'product_id' => $product->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 454 | `                    // OS opcional.` | OS opcional. |
| 455 | `                    'order_id' => $data['order_id'] ?? null,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 456 | `                    // Tipo.` | Tipo. |
| 457 | `                    'movement_type' => 'WITHDRAWAL',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 458 | `                    // Quantidade.` | Quantidade. |
| 459 | `                    'quantity' => $quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 460 | `                    // Observação.` | Observação. |
| 461 | `                    'observation' => $data['observation'] ?? 'Produto retirado do estoque para o tanque.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 462 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 463 | `            } else {` | Executa a instrução indicada pela implementação deste arquivo. |
| 464 | `                // Exige saldo suficiente no tanque para devolver.` | Exige saldo suficiente no tanque para devolver. |
| 465 | `                if ((float) $tankProduct->current_quantity < $quantity - 0.0000001) {` | Executa a instrução indicada pela implementação deste arquivo. |
| 466 | `                    throw new RuntimeException('A quantidade informada para devolução é maior que o saldo do tanque.');` | Interrompe a operação quando uma regra de negócio é violada. |
| 467 | `                }` | Executa a instrução indicada pela implementação deste arquivo. |
| 468 | `                // Guarda o estoque anterior.` | Guarda o estoque anterior. |
| 469 | `                $before = (float) ($product->stock ?? 0);` | Executa a instrução indicada pela implementação deste arquivo. |
| 470 | `                // Calcula o estoque posterior.` | Calcula o estoque posterior. |
| 471 | `                $after = $before + $quantity;` | Executa a instrução indicada pela implementação deste arquivo. |
| 472 | `                // Atualiza o estoque.` | Atualiza o estoque. |
| 473 | `                $product->update(['stock' => $after]);` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 474 | `                // Atualiza o tanque.` | Atualiza o tanque. |
| 475 | `                $tankProduct->update([` | Atualiza o registro persistido no banco. |
| 476 | `                    // Soma a devolução do dia.` | Soma a devolução do dia. |
| 477 | `                    'returned_quantity' => (float) $tankProduct->returned_quantity + $quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 478 | `                    // Diminui o saldo.` | Diminui o saldo. |
| 479 | `                    'current_quantity' => (float) $tankProduct->current_quantity - $quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 480 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 481 | `                // Registra a entrada no estoque por devolução.` | Registra a entrada no estoque por devolução. |
| 482 | `                ProductStockMovement::create([` | Cria e persiste um novo registro. |
| 483 | `                    // Produto.` | Produto. |
| 484 | `                    'product_id' => $product->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 485 | `                    // OS opcional.` | OS opcional. |
| 486 | `                    'order_id' => $data['order_id'] ?? null,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 487 | `                    // Tanque.` | Tanque. |
| 488 | `                    'operator_tank_id' => $tank->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 489 | `                    // Tipo.` | Tipo. |
| 490 | `                    'movement_type' => 'RETURN_FROM_TANK',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 491 | `                    // Quantidade.` | Quantidade. |
| 492 | `                    'quantity' => $quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 493 | `                    // Antes.` | Antes. |
| 494 | `                    'stock_before' => $before,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 495 | `                    // Depois.` | Depois. |
| 496 | `                    'stock_after' => $after,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 497 | `                    // Observação.` | Observação. |
| 498 | `                    'observation' => $data['observation'] ?? 'Devolução do tanque para o estoque.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 499 | `                    // Usuário.` | Usuário. |
| 500 | `                    'created_by' => $userId,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 501 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 502 | `                // Registra a saída do tanque.` | Registra a saída do tanque. |
| 503 | `                OperatorTankMovement::create([` | Cria e persiste um novo registro. |
| 504 | `                    // Tanque.` | Tanque. |
| 505 | `                    'operator_tank_id' => $tank->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 506 | `                    // Produto.` | Produto. |
| 507 | `                    'product_id' => $product->id,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 508 | `                    // OS opcional.` | OS opcional. |
| 509 | `                    'order_id' => $data['order_id'] ?? null,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 510 | `                    // Tipo.` | Tipo. |
| 511 | `                    'movement_type' => 'RETURN',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 512 | `                    // Quantidade.` | Quantidade. |
| 513 | `                    'quantity' => $quantity,` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 514 | `                    // Observação.` | Observação. |
| 515 | `                    'observation' => $data['observation'] ?? 'Produto devolvido ao estoque.',` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 516 | `                ]);` | Executa a instrução indicada pela implementação deste arquivo. |
| 517 | `            }` | Executa a instrução indicada pela implementação deste arquivo. |
| 518 | `            // Retorna o tanque atualizado.` | Retorna o tanque atualizado. |
| 519 | `            return $tank->refresh()->load('products.product', 'operator');` | Executa a instrução indicada pela implementação deste arquivo. |
| 520 | `        });` | Executa a instrução indicada pela implementação deste arquivo. |
| 521 | `    }` | Executa a instrução indicada pela implementação deste arquivo. |
| 522 | `}` | Executa a instrução indicada pela implementação deste arquivo. |
