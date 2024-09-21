<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role'     => RoleEnum::ADMIN->value,
        ]);

        (new CategorySeeder())->run();
        (new ProductSeeder())->run();
    }
}
