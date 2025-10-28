<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Clear Spatie's cached roles/permissions
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Create roles (guard 'web' to match your User model)
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $userRole  = Role::firstOrCreate(['name' => 'user',  'guard_name' => 'web']);

        // --- Admin user ---
        $admin = User::firstOrCreate(
            ['email' => 'admin@glisq.com'],
            [
                'name'              => 'GLISQ Admin',
                'password'          => Hash::make('admin12345'), 
                'email_verified_at' => now(),
                'is_admin'          => true,
            ]
        );
        // Assign/Sync role (idempotent)
        $admin->syncRoles([$adminRole]);

        // --- Normal user ---
        $user = User::firstOrCreate(
            ['email' => 'user@glisq.com'],
            [
                'name'              => 'GLISQ User',
                'password'          => Hash::make('user12345'), 
                'email_verified_at' => now(),
                'is_admin'          => false,
            ]
        );
        $user->syncRoles([$userRole]);
    }
}