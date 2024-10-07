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
        Schema::create('holdings', function (Blueprint $table) {
            $table->id(); // ID único para cada holding
            $table->string('nome'); // Nome da holding
            $table->string('cnpj')->unique(); // CNPJ único da holding
            $table->string('endereco'); // Endereço da holding
            $table->string('telefone'); // Telefone de contato
            $table->string('email')->unique(); // Email da holding
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holdings');
    }
};
