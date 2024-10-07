<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Holding;
use App\Models\Empresa;
use Faker\Factory as Faker;

class HoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Criar 10 holdings
        for ($i = 1; $i <= 10; $i++) {
            // Criar uma holding
            $holding = Holding::create([
                'nome' => $faker->company,
                'cnpj' => $this->gerarCnpjFicticio(),
                'endereco' => $faker->address,
                'telefone' => $faker->phoneNumber,
                'email' => $faker->companyEmail,
            ]);

            // Para cada holding, criar 20 empresas
            for ($j = 1; $j <= 20; $j++) {
                Empresa::create([
                    'holding_id' => $holding->id, // Relacionamento com a holding
                    'nome' => $faker->company,
                    'cnpj' => $this->gerarCnpjFicticio(),
                    'endereco' => $faker->address,
                    'telefone' => $faker->phoneNumber,
                    'email' => $faker->companyEmail,
                ]);
            }
        }
    }

    /**
     * Função para gerar CNPJ fictício.
     */
    private function gerarCnpjFicticio()
    {
        $cnpj = sprintf('%02d.%03d.%03d/%04d-%02d', mt_rand(0, 99), mt_rand(0, 999), mt_rand(0, 999), mt_rand(0, 9999), mt_rand(0, 99));
        return $cnpj;
    }
}
