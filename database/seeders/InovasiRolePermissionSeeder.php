<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class InovasiRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Reset cache Spatie Permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Definisikan semua Permission terkait Fitur Inovasi
        $permissions = [
            //'view-any inovasi',   // Melihat semua list inovasi (Admin)
            //'view-own inovasi',   // Melihat inovasi milik sendiri (Masyarakat)
            'create inovasi',     // Menginput/membuat inovasi baru (Admin & Masyarakat)
            'edit-any inovasi',   // Mengedit semua inovasi (Admin)
            'edit-own inovasi',   // Mengedit inovasi milik sendiri (Masyarakat)
            'delete-any inovasi', // Menghapus semua inovasi (Admin)
            'delete-own inovasi', // Menghapus inovasi milik sendiri (Masyarakat)
            //'approve inovasi',    // Validasi / menyetujui inovasi dari masyarakat (Admin)
        ];

        // Buat semua permission di atas ke dalam database
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // 3. Buat Role MASYARAKAT dan Berikan Hak Aksesnya
        $roleMasyarakat = Role::create(['name' => 'masyarakat']);
        $roleMasyarakat->givePermissionTo([
            // 'view-own inovasi',
            'create inovasi',
            'edit-own inovasi',
            'delete-own inovasi'
        ]);

        // 4. Buat Role ADMIN dan Berikan Semua Hak Akses
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo(Permission::all()); // Admin otomatis mendapat semua permission

    }
}
