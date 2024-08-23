<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();

        $company->users()->create(
            [
                'name'  => "Matheus",
                'cnpj'  => "12345678901234",
                'email' => "matheus@test.com" ,
                'password' => bcrypt('123456'),
            ]
        );
    }
}
