<?php

namespace Database\Seeders;

use App\Models\HoldingUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('pt_BR');

        if (!User::where('email', 'natan@teste.com.br')->first()) {
            HoldingUser::create([
                'name' => 'Natan',
                'email' => 'natan@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'nome_completo' => 'Natan Barbosa de Marins',
                'data_nascimento' => $faker->date,
                'telefone' => '21969726974',
                'cargo' => 'Presidente',
                'departamento' => 'Executivo',
                'holding_id' => 1
            ]);
        }
        
        if (!User::where('email', 'manu@teste.com.br')->first()) {
            User::create([
                'name' => 'Manu',
                'email' => 'manu@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'nome_completo' => 'Emanuele Barbosa de Marins',
                'data_nascimento' => $faker->date,
                'telefone' => '21969726974',
                'cargo' => 'CEO',
                'departamento' => 'Diretoria',
                'empresa_id' => 2
            ]);
        }
    }
}
