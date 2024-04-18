<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['name' => 'category-index'], ['name' => 'category-create'], ['name' => 'category-delete'], ['name' => 'category-update'],
            ['name' => 'supplier-index'],['name' => 'supplier-create'],  ['name' => 'supplier-delete'], ['name' => 'supplier-update'],
            ['name' => 'product-index'], ['name' => 'product-create'], ['name' => 'product-delete'], ['name' => 'product-update'],
        ])->each(fn ($data) => Permission::create($data));
    }
}
