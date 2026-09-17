<?php

namespace Tests\Feature\Registrations\Supplier;

use Tests\TestCase;

class SupplierTypeRelationshipStructureTest extends TestCase
{
    public function test_supplier_type_contract_is_consistent_across_request_service_and_resource(): void
    {
        $request = file_get_contents(base_path('app/Http/Requests/Registrations/Supplier/SupplierRequest.php'));
        $service = file_get_contents(base_path('app/Services/Registrations/Supplier/SupplierService.php'));
        $resource = file_get_contents(base_path('app/Http/Resources/Registrations/Supplier/SupplierResource.php'));
        $controller = file_get_contents(base_path('app/Http/Controllers/Registrations/Supplier/SupplierController.php'));

        $this->assertStringContainsString("'type_supplier_ids'", $request);
        $this->assertStringContainsString("'type_supplier_ids.*'", $request);
        $this->assertStringContainsString("\$this->has('typeSuppliers')", $request);
        $this->assertStringContainsString("\$data['type_supplier_ids']", $service);
        $this->assertStringContainsString('types()->sync($typeSupplierIds)', $service);
        $this->assertStringContainsString("'type_supplier_ids'", $resource);
        $this->assertStringContainsString("'types'", $controller);
    }

    public function test_supplier_models_and_migration_define_the_many_to_many_relationship(): void
    {
        $supplier = file_get_contents(base_path('app/Models/Registrations/Supplier/Supplier.php'));
        $typeSupplier = file_get_contents(base_path('app/Models/Registrations/Supplier/TypeSupplier.php'));
        $migration = file_get_contents(base_path('database/migrations/2026_09_06_000045_create_supplier_type_supplier_table.php'));

        $this->assertStringContainsString("belongsToMany(TypeSupplier::class, 'supplier_type_supplier')", $supplier);
        $this->assertStringContainsString("belongsToMany(Supplier::class, 'supplier_type_supplier')", $typeSupplier);
        $this->assertStringContainsString("foreignId('supplier_id')", $migration);
        $this->assertStringContainsString("foreignId('type_supplier_id')", $migration);
        $this->assertStringContainsString("unique(['supplier_id', 'type_supplier_id'])", $migration);
    }
}
