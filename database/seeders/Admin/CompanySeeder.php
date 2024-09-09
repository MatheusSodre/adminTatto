<?php

namespace Database\Seeders\Admin;

use App\Models\admin\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'cnpj' => '89094663000126',
            'name'=>'Elo',
            'url'=>'elo',
            'email'=> 'elo@elo.com.br',
        ]);

    }
}
