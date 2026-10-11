<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class InovasiRolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Buat Permission
        $permissions = [
            'create inovasi',
            'edit-any inovasi',
            'edit-own inovasi',
            'delete-any inovasi',
            'delete-own inovasi',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // 2. Buat Role & Assign Permission
        $roleMasyarakat = Role::firstOrCreate(['name' => 'masyarakat', 'guard_name' => 'web']);
        $roleMasyarakat->syncPermissions([
            'create inovasi',
            'edit-own inovasi',
            'delete-own inovasi'
        ]);

        $roleAdmin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $roleAdmin->syncPermissions(Permission::all());

        // 3. Buat User Admin
        // Catatan: Jika User model meng-cast 'password' => 'hashed', gunakan 'password123' langsung tanpa Hash::make()
        $admin = User::updateOrCreate(
            ['email' => 'admin@bapperida.go.id'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        $admin->syncRoles($roleAdmin);
    }
}