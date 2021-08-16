<?php

namespace Database\Seeders;

use App\Models\pelanggan;
use App\Models\produk;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
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

        Permission::create(['name' => 'manage_pelanggan']);
        Permission::create(['name' => 'manage_produk']);
        Permission::create(['name' => 'manage_kendaraan']);
        Permission::create(['name' => 'manage_pemesanan']);

        $role_pemilik = Role::create(['name' => 'Pemilik']);
        $role_manager = Role::create(['name' => 'Manager']);
        $role_pegawai = Role::create(['name' => 'Pegawai']);

        $role_pemilik->givePermissionTo(Permission::all());
        $role_manager->givePermissionTo(['manage_pelanggan','manage_produk','manage_kendaraan']);
        $role_pegawai->givePermissionTo(['manage_pemesanan']);

        //make user
        $pemilik = new User();
        $pemilik->password = Hash::make('password');
        $pemilik->email = 'pemilik@gmail.com';
        $pemilik->name = 'Pemilik';
        $pemilik->assignRole('Pemilik');
        $pemilik->save();

        //make manager
        $manager = new User();
        $manager->password = Hash::make('password');
        $manager->email = 'manager@gmail.com';
        $manager->name = 'Manager';
        $manager->assignRole('Manager');
        $manager->save();

        //make pegawai
        $pegawai = new User();
        $pegawai->password = Hash::make('password');
        $pegawai->email = 'pegawai@gmail.com';
        $pegawai->name = 'Pegawai';
        $pegawai->assignRole('Pegawai');
        $pegawai->save();


        //Testing Database
        produk::factory()->count(50)->create();
        pelanggan::factory()->count(50)->create();
    }
}
