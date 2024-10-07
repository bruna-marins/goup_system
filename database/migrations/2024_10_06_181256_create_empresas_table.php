<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id(); // ID único para cada empresa
            $table->foreignId('holding_id')->constrained('holdings')->onDelete('cascade'); // Chave estrangeira para holdings
            $table->string('nome'); // Nome da empresa
            $table->string('cnpj')->unique(); // CNPJ único da empresa
            $table->string('endereco'); // Endereço da empresa
            $table->string('telefone'); // Telefone de contato
            $table->string('email')->unique(); // Email da empresa
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
