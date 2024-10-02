<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Financial\Transaction;
use Database\Seeders\Admin\{CompanySeeder,PermissionsSeeder,ClientSeeder};
use Database\Seeders\Financial\CategoriesPaymentSeeder;
use Database\Seeders\Financial\PaymentMethodSeeder;
use Database\Seeders\Financial\TransactionSeeder;
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

            CompanySeeder::class,
            UserSeeder::class,
            CategoriesPaymentSeeder::class,
            ClientSeeder::class,
            PaymentMethodSeeder::class,
            // TypeFilesSeeder::class,
            PermissionsSeeder::class,
            // TransactionSeeder::class,
            // StatusSeeder::class,
            // MarkSeeder::class,
            // CategorieSeeder::class,
            // SupplierSeeder::class,
            // MeasureSeeder::class,
            // ProductSeeder::class,
            // PriceSeeder::class,
            // StockSeeder::class
        ]);

        Transaction::factory(count: 60)->create();

    }
}
