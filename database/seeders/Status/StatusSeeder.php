<?php

namespace Database\Seeders\Status;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            [
                'uuid'       => Str::uuid(),
                'name'       => "ativo",
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'uuid'       => Str::uuid(),
                'name'       => "inativo",
                'created_at'  => now(),
                'updated_at'  => now(),
            ]
        ]);
    }
}
