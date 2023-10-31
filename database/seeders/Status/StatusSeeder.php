<?php

namespace Database\Seeders\Status;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            [
                'name'       => "ativo",
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'       => "inativo",
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        ]);
    }
}
