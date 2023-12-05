<?php

namespace Database\Seeders\Produto;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 40; $i++)
        {
        $quant = rand(50,100);
        DB::table('stocks')->insert([
                'uuid'       => (string)Str::uuid(),
                'product_id' => $i,
                'quantity'   => $quant,
                'quantity_min' => $quant - rand(10,30),
                'quantity_max' => $quant + rand(10,20),
                'status_id'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}