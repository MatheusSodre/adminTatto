<?php

namespace Database\Seeders\Financial;

use App\Models\Financial\CategoriesPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories_payments')->insert([
            ['name' => 'Água',
            'type' => 'expense'],
            ['name' => 'Luz',
            'type' => 'expense'],
            ['name' => 'Aluguel',
            'type' => 'expense'],
            ['name' => 'Receita',
            'type' => 'revenue'],
            ['name' => 'Equipamentos',
            'type' => 'expense'],
        ]
        );
    }
}
