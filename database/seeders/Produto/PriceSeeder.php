<?php

namespace Database\Seeders\Produto;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i = 1; $i <= 50; $i++)
        {
        $price = (double)round(rand(1000, 9999) / 100, 2);
        DB::table('prices')->insert([
                'uuid'          => (string)Str::uuid(),
                'price'         =>  number_format($price,2),
                'price_last_buy'=>  number_format($price - ($price * 0.10),2),
                'cost_last_buy' =>  number_format($price - ($price * 0.25),2),
                'cost_avg'      =>  number_format($price - ($price * 0.27),2),
                'margin'        =>  number_format($price + ($price * 0.25),2),
                'status_id'     => 1,
                'created_at'    =>now(),
                'updated_at'    =>now(),
            ]);
        }
    }
}

