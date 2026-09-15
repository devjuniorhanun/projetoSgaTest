# Documentação linha a linha — `routes/api.php`

Cada linha do arquivo original é reproduzida abaixo e acompanhada da finalidade técnica no contexto da Fase 5.

| Linha | Código | Explicação |
|---:|---|---|
| 1 | `<?php` | Inicia o arquivo PHP. |
| 2 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 3 | `use App\Http\Controllers\AuthController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 4 | `use App\Http\Controllers\Imports\LegacyImportController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 5 | `use App\Http\Controllers\Controller;` | Importa a classe ou dependência utilizada nesta implementação. |
| 6 | `use App\Http\Controllers\Registrations\Admin\ConfigController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 7 | `use App\Http\Controllers\Registrations\Admin\RoleController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 8 | `use App\Http\Controllers\Registrations\Admin\UserController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 9 | `use App\Http\Controllers\Registrations\Agricultural\ActiveIngredientController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 10 | `use App\Http\Controllers\Registrations\Agricultural\AgriculturalOperatorController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 11 | `use App\Http\Controllers\Registrations\Agricultural\AgriculturalProductController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 12 | `use App\Http\Controllers\Registrations\Agricultural\TypeFormulationController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 13 | `use App\Http\Controllers\Registrations\Agricultural\TypeOperationController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 14 | `use App\Http\Controllers\Registrations\Financial\AdministrativeCenterController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 15 | `use App\Http\Controllers\Registrations\Financial\CostCenterController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 16 | `use App\Http\Controllers\Registrations\Financial\TypePayAccountController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 17 | `use App\Http\Controllers\Registrations\Harvest\AgriculturalYearController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 18 | `use App\Http\Controllers\Registrations\Harvest\CropController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 19 | `use App\Http\Controllers\Registrations\Harvest\CultureController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 20 | `use App\Http\Controllers\Registrations\Harvest\VarietyCultureController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 21 | `use App\Http\Controllers\Registrations\Property\OwnerController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 22 | `use App\Http\Controllers\Registrations\Property\ProducerController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 23 | `use App\Http\Controllers\Registrations\Product\ProductController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 24 | `use App\Http\Controllers\Registrations\Product\ProductGroupController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 25 | `use App\Http\Controllers\Registrations\Product\SubGroupProductController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 26 | `use App\Http\Controllers\Registrations\Product\SupplierProductController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 27 | `use App\Http\Controllers\Registrations\Property\Areas\FarmController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 28 | `use App\Http\Controllers\Registrations\Property\Areas\FieldController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 29 | `use App\Http\Controllers\Registrations\Property\Areas\MatrixFreightController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 30 | `use App\Http\Controllers\Registrations\Property\Areas\PlotFieldController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 31 | `use App\Http\Controllers\Registrations\Supplier\BankSupplierController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 32 | `use App\Http\Controllers\Registrations\Supplier\DriverController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 33 | `use App\Http\Controllers\Registrations\Supplier\LanyardController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 34 | `use App\Http\Controllers\Registrations\Supplier\SupplierController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 35 | `use App\Http\Controllers\Registrations\Supplier\TypeSupplierController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 36 | `use App\Http\Controllers\Registrations\Supplier\WarehouseController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 37 | `use App\Http\Controllers\Registrations\Supplier\Contracts\DriverContractController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 38 | `use App\Http\Controllers\Registrations\Supplier\Contracts\DriversContractsController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 39 | `use App\Http\Controllers\Registrations\Supplier\Contracts\LanyardContractController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 40 | `use App\Http\Controllers\Registrations\Supplier\Contracts\LanyardsContractsController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 41 | `use App\Http\Controllers\Registrations\Vehicle\FleetBrandController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 42 | `use App\Http\Controllers\Registrations\Vehicle\FleetController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 43 | `use App\Http\Controllers\Registrations\Vehicle\FleetGroupController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 44 | `use App\Http\Controllers\Registrations\Vehicle\FleetModelController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 45 | `use Illuminate\Support\Facades\Route;` | Importa a classe ou dependência utilizada nesta implementação. |
| 46 | `// Importa o controller de lançamento de OS de defensivos.` | Importa o controller de lançamento de OS de defensivos. |
| 47 | `use App\Http\Controllers\Entries\Agricultural\AgriculturalDefensiveOrderController;` | Importa a classe ou dependência utilizada nesta implementação. |
| 48 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 49 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 50 | `Route::get('/health', fn () => response()->json(['status' => 'ok', 'service' => 'api', 'framework' => 'laravel']));` | Define um campo, regra, atributo, relacionamento ou configuração dentro da estrutura atual. |
| 51 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 52 | `Route::post('/auth/login', [AuthController::class, 'login'])->middleware('throttle:10,1');` | Registra uma rota HTTP da API. |
| 53 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 54 | `Route::middleware('auth:sanctum')->group(function (): void {` | Registra uma rota HTTP da API. |
| 55 | `    Route::get('/auth/me', [AuthController::class, 'me']);` | Registra uma rota HTTP da API. |
| 56 | `    Route::post('/auth/logout', [AuthController::class, 'logout']);` | Registra uma rota HTTP da API. |
| 57 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 58 | `    Route::middleware('role:SUPER,ADM')->group(function (): void {` | Registra uma rota HTTP da API. |
| 59 | `        // Permite importar os CSVs do sistema antigo somente para administradores.` | Permite importar os CSVs do sistema antigo somente para administradores. |
| 60 | `        Route::post('imports/legacy/preview', [LegacyImportController::class, 'preview']);` | Registra uma rota HTTP da API. |
| 61 | `        Route::post('imports/legacy', [LegacyImportController::class, 'import']);` | Registra uma rota HTTP da API. |
| 62 | `        Route::get('imports/legacy', [LegacyImportController::class, 'index']);` | Registra uma rota HTTP da API. |
| 63 | `        Route::get('imports/legacy/{batch}', [LegacyImportController::class, 'show']);` | Registra uma rota HTTP da API. |
| 64 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 65 | `        Route::apiResource('registrations/admin/roles', RoleController::class);` | Registra uma rota HTTP da API. |
| 66 | `        Route::apiResource('registrations/admin/users', UserController::class);` | Registra uma rota HTTP da API. |
| 67 | `        Route::apiResource('users', UserController::class);` | Registra uma rota HTTP da API. |
| 68 | `        Route::apiResource('registrations/admin/configs', ConfigController::class);` | Registra uma rota HTTP da API. |
| 69 | `        Route::apiResource('registrations/harvest/agricultural-years', AgriculturalYearController::class);` | Registra uma rota HTTP da API. |
| 70 | `        Route::apiResource('registrations/harvest/cultures', CultureController::class);` | Registra uma rota HTTP da API. |
| 71 | `        Route::get('registrations/harvest/crops/{crop}/cultures', [CropController::class, 'cultures']);` | Registra uma rota HTTP da API. |
| 72 | `        Route::apiResource('registrations/harvest/crops', CropController::class);` | Registra uma rota HTTP da API. |
| 73 | `        Route::apiResource('registrations/agricultural/active-ingredients', ActiveIngredientController::class);` | Registra uma rota HTTP da API. |
| 74 | `        Route::apiResource('registrations/agricultural/agricultural-operators', AgriculturalOperatorController::class);` | Registra uma rota HTTP da API. |
| 75 | `        Route::apiResource('registrations/agricultural/agricultural-products', AgriculturalProductController::class);` | Registra uma rota HTTP da API. |
| 76 | `        Route::apiResource('registrations/agricultural/type-formulations', TypeFormulationController::class);` | Registra uma rota HTTP da API. |
| 77 | `        Route::apiResource('registrations/agricultural/type-operations', TypeOperationController::class);` | Registra uma rota HTTP da API. |
| 78 | `        Route::apiResource('registrations/financial/administrative-centers', AdministrativeCenterController::class);` | Registra uma rota HTTP da API. |
| 79 | `        Route::apiResource('registrations/financial/cost-centers', CostCenterController::class);` | Registra uma rota HTTP da API. |
| 80 | `        Route::apiResource('registrations/financial/type-pay-accounts', TypePayAccountController::class);` | Registra uma rota HTTP da API. |
| 81 | `        Route::apiResource('registrations/harvest/property/owners', OwnerController::class);` | Registra uma rota HTTP da API. |
| 82 | `        Route::apiResource('registrations/harvest/property/producers', ProducerController::class);` | Registra uma rota HTTP da API. |
| 83 | `        Route::apiResource('registrations/product/products', ProductController::class);` | Registra uma rota HTTP da API. |
| 84 | `        Route::apiResource('registrations/product/product-groups', ProductGroupController::class);` | Registra uma rota HTTP da API. |
| 85 | `        Route::apiResource('registrations/product/sub-group-products', SubGroupProductController::class);` | Registra uma rota HTTP da API. |
| 86 | `        Route::apiResource('registrations/product/supplier-products', SupplierProductController::class);` | Registra uma rota HTTP da API. |
| 87 | `        Route::apiResource('registrations/property/areas/farms', FarmController::class);` | Registra uma rota HTTP da API. |
| 88 | `        Route::apiResource('registrations/property/areas/fields', FieldController::class);` | Registra uma rota HTTP da API. |
| 89 | `        Route::apiResource('registrations/property/areas/matrix-freights', MatrixFreightController::class);` | Registra uma rota HTTP da API. |
| 90 | `        Route::apiResource('registrations/property/areas/plot-fields', PlotFieldController::class);` | Registra uma rota HTTP da API. |
| 91 | `        Route::apiResource('registrations/supplier/bank-suppliers', BankSupplierController::class);` | Registra uma rota HTTP da API. |
| 92 | `        Route::apiResource('registrations/supplier/drivers', DriverController::class);` | Registra uma rota HTTP da API. |
| 93 | `        Route::apiResource('registrations/supplier/lanyards', LanyardController::class);` | Registra uma rota HTTP da API. |
| 94 | `        Route::apiResource('registrations/supplier/suppliers', SupplierController::class);` | Registra uma rota HTTP da API. |
| 95 | `        Route::apiResource('registrations/supplier/type-suppliers', TypeSupplierController::class);` | Registra uma rota HTTP da API. |
| 96 | `        Route::apiResource('registrations/supplier/warehouses', WarehouseController::class);` | Registra uma rota HTTP da API. |
| 97 | `        Route::apiResource('registrations/supplier/contracts/driver-contracts', DriverContractController::class);` | Registra uma rota HTTP da API. |
| 98 | `        Route::apiResource('registrations/supplier/contracts/drivers-contracts', DriversContractsController::class);` | Registra uma rota HTTP da API. |
| 99 | `        Route::apiResource('registrations/supplier/contracts/lanyard-contracts', LanyardContractController::class);` | Registra uma rota HTTP da API. |
| 100 | `        Route::apiResource('registrations/supplier/contracts/lanyards-contracts', LanyardsContractsController::class);` | Registra uma rota HTTP da API. |
| 101 | `        Route::apiResource('registrations/vehicle/fleet-brands', FleetBrandController::class);` | Registra uma rota HTTP da API. |
| 102 | `        Route::apiResource('registrations/vehicle/fleets', FleetController::class);` | Registra uma rota HTTP da API. |
| 103 | `        Route::apiResource('registrations/vehicle/fleet-groups', FleetGroupController::class);` | Registra uma rota HTTP da API. |
| 104 | `        Route::apiResource('registrations/vehicle/fleet-models', FleetModelController::class);` | Registra uma rota HTTP da API. |
| 105 | `    });` | Executa a instrução indicada pela implementação deste arquivo. |
| 106 | `` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 107 | `    // Consulta as variedades vinculadas a uma cultura.` | Consulta as variedades vinculadas a uma cultura. |
| 108 | `    Route::get('registrations/harvest/cultures/{culture}/varieties', [VarietyCultureController::class, 'byCulture']);` | Registra uma rota HTTP da API. |
| 109 | `    Route::apiResource('registrations/harvest/varieties', VarietyCultureController::class);` | Registra uma rota HTTP da API. |
| 110 | `    ` | Linha em branco usada para separar blocos e melhorar a leitura. |
| 111 | `    // Rotas de lançamento e execução de OS de defensivos agrícolas.` | Rotas de lançamento e execução de OS de defensivos agrícolas. |
| 112 | `    Route::prefix('entries/agricultural/defensive-orders')->group(function (): void {` | Registra uma rota HTTP da API. |
| 113 | `        // Lista as ordens de serviço.` | Lista as ordens de serviço. |
| 114 | `        Route::get('/', [AgriculturalDefensiveOrderController::class, 'index']);` | Registra uma rota HTTP da API. |
| 115 | `        // Cria uma OS por talhão recebido em fields[].` | Cria uma OS por talhão recebido em fields[]. |
| 116 | `        Route::post('/', [AgriculturalDefensiveOrderController::class, 'store']);` | Registra uma rota HTTP da API. |
| 117 | `        // Exibe uma OS.` | Exibe uma OS. |
| 118 | `        Route::get('/{order}', [AgriculturalDefensiveOrderController::class, 'show']);` | Registra uma rota HTTP da API. |
| 119 | `        // Cria novas OS filhas durante a edição/reemissão.` | Cria novas OS filhas durante a edição/reemissão. |
| 120 | `        Route::post('/{order}/reissue', [AgriculturalDefensiveOrderController::class, 'reissue']);` | Registra uma rota HTTP da API. |
| 121 | `        // Realiza fechamento parcial ou final.` | Realiza fechamento parcial ou final. |
| 122 | `        Route::post('/close', [AgriculturalDefensiveOrderController::class, 'close']);` | Registra uma rota HTTP da API. |
| 123 | `        // Obtém ou cria o tanque diário do operador.` | Obtém ou cria o tanque diário do operador. |
| 124 | `        Route::get('/tank/operator/{operator}', [AgriculturalDefensiveOrderController::class, 'tank']);` | Registra uma rota HTTP da API. |
| 125 | `        // Retira produto do estoque ou devolve produto ao estoque.` | Retira produto do estoque ou devolve produto ao estoque. |
| 126 | `        Route::post('/tank/movement', [AgriculturalDefensiveOrderController::class, 'tankMovement']);` | Registra uma rota HTTP da API. |
| 127 | `    });` | Executa a instrução indicada pela implementação deste arquivo. |
| 128 | `});` | Executa a instrução indicada pela implementação deste arquivo. |
