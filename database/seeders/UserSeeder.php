<?php

namespace Database\Seeders;

use App\Models\HoldingUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'natan@teste.com.br')->first()) {
            HoldingUser::create([
                'name' => 'Natan',
                'email' => 'natan@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'holding_id' => 1
            ]);
        }
        
        if (!User::where('email', 'manu@teste.com.br')->first()) {
            HoldingUser::create([
                'name' => 'Manu',
                'email' => 'manu@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'holding_id' => 4
            ]);
        }
        
        if (!User::where('email', 'bruna@teste.com.br')->first()) {
            User::create([
                'name' => 'Bruna',
                'email' => 'bruna@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'empresa_id' => 3,
            ]);
        }
        
        if (!User::where('email', 'ronaldo@teste.com.br')->first()) {
            User::create([
                'name' => 'Ronaldo',
                'email' => 'ronaldo@teste.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
                'empresa_id' => 3,
            ]);
        }
    }
}
