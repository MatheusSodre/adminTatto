<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'name' => 'cliente1',
                'email' => 'cliente1@teste.com',
                'phone' => '123456789',
            ],
            [
                'name' => 'cliente2',
                'email' => 'cliente2@teste.com',
                'phone' => '123456789'
            ],
            [
                'name' => 'cliente2',
                'email' => 'cliente1@teste.com',
                'phone' => '123456789'
            ],

        ]
        );
    }
}
