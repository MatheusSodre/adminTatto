<?php

namespace Database\Seeders\Produto;


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
                'cod'      => "100".$i,
                'sku'      => (string)rand(1000000,10000000),
                'bar_code' => (string)rand(10000,100000),
                'name'     => $name,
                'price_id' => rand(1,50),
                'product_category_id' => rand(1,3),
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
