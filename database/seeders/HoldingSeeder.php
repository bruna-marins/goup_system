<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Holding;
use App\Models\Empresa;
use App\Models\HoldingUser;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class HoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');

        // Cadastrando 5 holdings
        for ($i = 1; $i <= 5; $i++) {
            $holding = Holding::create([
                'nome' => $faker->company,
                'cnpj' => $faker->cnpj,
                'telefone' => $faker->phoneNumber,
                'site' => $faker->domainName,
                'email' => $faker->companyEmail,
                'nome_fantasia' => $faker->companySuffix,
                'data_abertura' => $faker->date,
                'inscricao_municipal' => $faker->randomNumber(8, true),
                'cep' => $faker->postcode,
                'logradouro' => $faker->streetName,
                'numero' => $faker->buildingNumber,
                'bairro' => $faker->citySuffix,
                'cidade' => $faker->city,
                'estado' => $faker->stateAbbr,
                'complemento' => $faker->secondaryAddress,
                'cnae' => $faker->randomNumber(5, true),
                'capital_social' => $faker->randomFloat(2, 10000, 500000),
                'faturamento_anual' => $faker->randomFloat(2, 50000, 1000000),
                'responsavel_contabil' => $faker->name,
                'codigo_tributacao' => $faker->randomNumber(4, true),
                'aliquota_fiscais' => $faker->randomFloat(2, 0, 30),
                'socio' => $faker->name,
                'cpf' => $faker->cpf,
                'participacao_societaria' => $faker->randomFloat(2, 0, 100),
                'cargo' => $faker->jobTitle,
                'natureza_juridica' => 'EI',
                'regime_tributario' => 'Simples Nacional',
            ]);

            // Cadastrando 10 usuários para cada holding
            for ($j = 1; $j <= 10; $j++) {
                HoldingUser::create([
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'password' => Hash::make('password'), // senha padrão
                    'holding_id' => $holding->id,
                    'nome_completo' => $faker->name,
                    'cpf' => $faker->cpf,
                    'data_nascimento' => $faker->date,
                    'telefone' => $faker->phoneNumber,
                    'cargo' => $faker->jobTitle,
                    'departamento' => $faker->word,
                ]);
            }

            // Cadastrando 5 empresas para cada holding
            for ($k = 1; $k <= 5; $k++) {
                $empresa = Empresa::create([
                    'holding_id' => $holding->id,
                    'nome' => $faker->company,
                    'cnpj' => $faker->cnpj,
                    'telefone' => $faker->phoneNumber,
                    'site' => $faker->domainName,
                    'email' => $faker->companyEmail,
                    'nome_fantasia' => $faker->companySuffix,
                    'data_abertura' => $faker->date,
                    'inscricao_municipal' => $faker->randomNumber(8, true),
                    'cep' => $faker->postcode,
                    'logradouro' => $faker->streetName,
                    'numero' => $faker->buildingNumber,
                    'bairro' => $faker->citySuffix,
                    'cidade' => $faker->city,
                    'estado' => $faker->stateAbbr,
                    'complemento' => $faker->secondaryAddress,
                    'cnae' => $faker->randomNumber(5, true),
                    'capital_social' => $faker->randomFloat(2, 10000, 500000),
                    'faturamento_anual' => $faker->randomFloat(2, 50000, 1000000),
                    'responsavel_contabil' => $faker->name,
                    'codigo_tributacao' => $faker->randomNumber(4, true),
                    'aliquota_fiscais' => $faker->randomFloat(2, 0, 30),
                    'socio' => $faker->name,
                    'cpf' => $faker->cpf,
                    'participacao_societaria' => $faker->randomFloat(2, 0, 100),
                    'cargo' => $faker->jobTitle,
                    'natureza_juridica' => 'MEI',
                    'regime_tributario' => 'Simples Nacional',
                ]);

                // Cadastrando 10 usuários para cada empresa
                for ($l = 1; $l <= 10; $l++) {
                    User::create([
                        'name' => $faker->name,
                        'email' => $faker->unique()->safeEmail,
                        'password' => Hash::make('password'), // senha padrão
                        'empresa_id' => $empresa->id,
                        'nome_completo' => $faker->name,
                        'cpf' => $faker->cpf,
                        'data_nascimento' => $faker->date,
                        'telefone' => $faker->phoneNumber,
                        'cargo' => $faker->jobTitle,
                        'departamento' => $faker->word,
                    ]);
                }
            }
        }
    }
}
