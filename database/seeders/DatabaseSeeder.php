<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@marinexa.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@marinexa.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'title' => 'System Administrator',
                'email_verified_at' => now(),
            ]
        );
        
        // Create sales user
        User::updateOrCreate(
            ['email' => 'sales@marinexa.com'],
            [
                'name' => 'Sales Team',
                'email' => 'sales@marinexa.com',
                'password' => Hash::make('password'),
                'role' => 'sales',
                'title' => 'Sales Manager',
                'email_verified_at' => now(),
            ]
        );
        
        // Create support user
        User::updateOrCreate(
            ['email' => 'support@marinexa.com'],
            [
                'name' => 'Support Team',
                'email' => 'support@marinexa.com',
                'password' => Hash::make('password'),
                'role' => 'support',
                'title' => 'Customer Support',
                'email_verified_at' => now(),
            ]
        );
        
        // Run other seeders
        $this->call([
            TemplateSeeder::class,
        ]);
    }
}
