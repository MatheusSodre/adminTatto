<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'name'  => "users",
                'description' => ''
            ],
            [
                'name'  => "arquivos",
                'description' => ''
            ],
            [
                'name'  => "perfis",
                'description' => ''
            ],
            [
                'name'  => "permissões",
                'description' => ''
            ],
            [
                'name'  => "logs",
                'description' => ''
            ],
            [
                'name'  => "ver-todos-arquivos",
                'description' => ''
            ],
            [
                'name'  => "ver-arquivos",
                'description' => ''
            ],
            [
                'name'  => "excluir-arquivos",
                'description' => ''
            ]
        ]
        );
    }
}
