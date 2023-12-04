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
        for ($i = 1; $i <= 4; $i++)
        {
        DB::table('measures')->insert([
                'uuid'          => (string)Str::uuid(),
                'name'          => $measures[$i],
                'status_id'     => 1,
                'created_at'    =>now(),
                'updated_at'    =>now(),
            ]);
        }
    }
}
