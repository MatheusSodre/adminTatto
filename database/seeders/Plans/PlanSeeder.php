<?php

namespace Database\Seeders\Plans;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <=15; $i++)
        {
            $name  = "Nome Teste ".$i;
            
            DB::table('plans')->insert([
                // 'uuid'          => Str::uuid(),
                'name'          => $name,
                'url'           => Str::slug($name,"-"),
                'price'         => rand(10,100),
                'description'   => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
                'created_at'    =>now(),
                'updated_at'    =>now(),
            ]);
        }
    }
}
