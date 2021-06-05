<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'manage_items']);
        Permission::create(['name' => 'manage_orders']);
        Permission::create(['name' => 'manage_customers']);
        Permission::create(['name' => 'manage_delivery']);
        Permission::create(['name' => 'see_delivery']);

        $role_pemilik = Role::create(['name' => 'Pemilik']);
        $role_manager = Role::create(['name' => 'Manager']);
        $role_pegawai = Role::create(['name' => 'Pegawai']);

        $role_pemilik->givePermissionTo(Permission::all());
        $role_manager->givePermissionTo(['manage_items','manage_orders','manage_customers']);
        $role_pegawai->givePermissionTo(['see_delivery']);
    }
}
