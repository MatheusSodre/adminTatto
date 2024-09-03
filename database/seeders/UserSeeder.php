<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();

        DB::table('users')->insert([
            [
                'name'  => "Matheus",
                'company_id' => $company->id,
                'cnpj'  => "12345678901234",
                'email' => "matheus@test.com" ,
                'password' => bcrypt('123456'),
            ],
            [
                'name'  => "Cliente1",
                'company_id' => $company->id,
                'cnpj'  => "123456789415494",
                'email' => "Cliente1@test.com" ,
                'password' => bcrypt('123456'),
            ]
        ]
        );
    }
}
