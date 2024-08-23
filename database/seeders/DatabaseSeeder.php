<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Admin\CompanySeeder;
use Database\Seeders\Produto\{SupplierSeeder,CategorieSeeder,MarkSeeder,PlanSeeder,MeasureSeeder,ProductSeeder,PriceSeeder,StockSeeder};


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
            // PlanSeeder::class,
            CompanySeeder::class,
            UserSeeder::class
            // StatusSeeder::class,
            // MarkSeeder::class,
            // CategorieSeeder::class,
            // SupplierSeeder::class,
            // MeasureSeeder::class,
            // ProductSeeder::class,
            // PriceSeeder::class,
            // StockSeeder::class
        ]);

    }
}
