<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database: the /admin account and the site content.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SiteContentSeeder::class,
        ]);
    }
}
