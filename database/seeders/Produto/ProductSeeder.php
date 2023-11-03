<?php

namespace Database\Seeders\Produto;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <=40; $i++)
        {
        $name  = "Produto 0".$i;
            DB::table('products')->insert([
                'uuid'     => Str::uuid(),
                'cod'      => "10".$i,
                'sku'      => rand(10,100),
                'bar_code' => rand(10,100),
                'name'     => $name,
                'price_id' => rand(1,3),
                'category_id' => rand(1,3),
                'mark_id'     => rand(1,3),
                'supplier_id' => rand(1,3),
                'measure_id'  => rand(1,2),
                'status_id'     => 1,
                'created_at'    =>now(),
                'updated_at'    =>now(),
            ]);
        }
    }
}
// 'uuid','cod','sku','bar_code','name','price_id','category_id','mark_id','supplier_id','measure_id','status_id','image'
