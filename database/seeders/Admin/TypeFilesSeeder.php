<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesFiles = ["Benefícios VA / VT",
                        "Caged",
                        "Cartão Ponto",
                        "Certidão de Débitos Tributários e de Dívida Ativa Estadual",
                        "Certidão Negativa de Débitos Trabalhistas",
                        "Certidão Negativa de Tributos e outros Débitos Municipais",
                        "Certidão Negativa Tributos Federais e Previdenciários",
                        "Comprovante de Pagamento de Salários",
                        "COMPROVANTE DE PGTO DE SALÁRIO",
                        "Conectividade Social",
                        "Ficha de EPI",
                        "Ficha de Registro",
                        "Folha - Relação de Cálculo",
                        "GPS - Comprovante de Pagamento",
                        "GPS - Guia da Previdência Social",
                        "GPS - Relatório Analítico de Comprovante de Declaração das Contribuições ao INSS",
                        "GPS 13º SALÁRIO",
                        "GRF - Comprovante de Pagamento",
                        "GRF - Guia de Recolhimento do FGTS",
                        "GRF - Relatório Analítico",
                        "Holerite",
                        "INSS - Relatório de Compensação",
                        "ISS - Comprovante de Pagamento",
                        "Recibo de Férias",
                        "Relação de Empregados",
                        "Relação de Tomador/Obra - RET",
                        "Relação dos Trabalhadores - SEFIP",
                        "Rubrica",
                        "Termo de Rescisão",
                        "Outros"];

        foreach ($typesFiles as  $type) {
            DB::table('type_files')->insert([
                'name'       => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }

}

