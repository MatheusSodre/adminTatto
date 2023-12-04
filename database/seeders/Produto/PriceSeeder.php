<?php

namespace Database\Seeders\Produto;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $measures = [ 1 => "UN", 2 => "KG", 3 => "CX",4 => "G"];
        $price = (double)round(rand(1000, 9999) / 100, 2);
        for ($i = 1; $i <= 50; $i++)
        {
        DB::table('measures')->insert([
                'uuid'          => (string)Str::uuid(),
                'price'         => $price,
                'price_last_buy'=> $price - ($price * 0.10),
                'cost_last_buy' => $price - ($price * 0.25),
                'cost_avg'      => $price - ($price * 0.27),
                'margin'        => $price + ($price * 0.25),
                'status_id'     => 1,
                'created_at'    =>now(),
                'updated_at'    =>now(),
            ]);
        }
    }
}

