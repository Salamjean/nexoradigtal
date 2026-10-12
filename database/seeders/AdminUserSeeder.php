<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Administrator account of the /admin panel (the password is hashed by the User model).
 * Change it from "Mon compte" once the site is online.
 */
class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'Administrateur', 'password' => '12345678'],
        );
    }
}
