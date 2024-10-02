<?php

namespace Database\Seeders\Financial;

use App\Models\Financial\CategoriesPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            ['name' => 'Dinheiro'],
            ['name' => 'Cartão de credito'],
            ['name' => 'Cartão de debito'],
            ['name' => 'Boleto']
          ]
        );
    }
}
