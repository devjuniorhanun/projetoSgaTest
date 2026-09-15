# Arquivos da Fase 6

## Models
`app/Models/Releases/Fuel/`

- FuelStation
- FuelTank
- FuelStationProduct
- FuelRegistradora
- FuelRegistradoraReading
- FuelTankGaugeTable
- FuelTankGaugeReading
- FuelEntry
- FuelTransfer
- FuelRefueling
- FleetMeterReading
- FuelStockMovement
- FleetOilChange
- FleetMaintenancePlan
- FleetMaintenanceRecord

## Services
- `FuelModuleConstants.php`
- `FuelStockService.php`
- `FuelManagementService.php`

## Controllers
Todos os controllers ficam em `app/Http/Controllers/Releases/Fuel/`.

## Requests e Resources
Todos ficam respectivamente em `app/Http/Requests/Releases/Fuel/` e `app/Http/Resources/Releases/Fuel/`.

## Alteração existente
`app/Models/Registrations/Vehicle/Fleet.php` recebeu relações para leituras de medidor, abastecimentos, trocas de óleo e planos de manutenção. O campo existente `marking_type` continua sendo a referência para H/K.

## Rotas
As rotas foram adicionadas a `routes/api.php` dentro do prefixo `releases/fuel`.
