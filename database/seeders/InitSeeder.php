<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class InitSeeder extends Seeder
{
    public function run(): void
    {
        // Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole  = Role::firstOrCreate(['name' => 'user']);

        // Admin user
        if (!User::where('email','admin@glisq.com')->exists()) {
            $admin = User::create([
                'name' => 'GLISQ Admin',
                'email' => 'admin@glisq.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
            $admin->assignRole($adminRole);
        }

        // Demo user
        if (!User::where('email','user@glisq.com')->exists()) {
            $user = User::create([
                'name' => 'GLISQ User',
                'email' => 'user@glisq.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
            $user->assignRole($userRole);
        }

        // Products (sample)
        if (Product::count() === 0) {
            Product::insert([
                [
                    'name' => 'GLISQ – 2-in-1 Silk Sericin Serum and Moisturizer',
                    'slug' => 'glisq-2-in-1-silk-sericin-serum-and-moisturizer',
                    'description' => 'Experience effortless radiance with GLISQ – 2-in-1 Silk Sericin Serum and Moisturizer, a lightweight formula infused with natural silk cocoon protein. Designed to deeply hydrate, brighten, and protect your skin, this dual-action product simplifies your skincare routine while keeping your complexion smooth, glowing, and refreshed all day long.',
                    'price' => 8.95,
                    'image_path' => '/images/serum.png',
                    'is_published' => true,
                    'created_at' => now(), 'updated_at' => now()
                ],
            ]);
        }
    }
}