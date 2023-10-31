<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Company\CategorySeeder;
use Database\Seeders\Company\CompanySeeder;
use Database\Seeders\Produto\CategorieSeeder;
use Database\Seeders\Produto\MarkSeeder;
use Database\Seeders\Plans\PlanSeeder;
use Database\Seeders\Status\StatusSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            CompanySeeder::class,
            PlanSeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
            MarkSeeder::class,
            CategorieSeeder::class
        ]);
        
    }
}
