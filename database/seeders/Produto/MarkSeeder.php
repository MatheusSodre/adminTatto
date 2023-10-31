<?php

namespace Database\Seeders\Produto;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <=3; $i++)
        {
            $name  = "Marca 0".$i;
            DB::table('marks')->insert([
                'name'          => $name,
                'status_id'     => 1,
                'created_at'    =>now(),
                'updated_at'    =>now(),
            ]);
        }
    }
}
