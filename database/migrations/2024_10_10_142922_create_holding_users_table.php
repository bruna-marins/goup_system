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
        Schema::create('holding_users', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('name'); // Nome do usuário da holding
            $table->string('email')->unique(); // Email único
            $table->timestamp('email_verified_at')->nullable(); // Verificação de email
            $table->string('password'); // Senha do usuário
            $table->foreignId('holding_id')->constrained('holdings')->onDelete('cascade'); // Relacionamento com a tabela holdings
            $table->rememberToken(); // Token de sessão
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps(); // Timestamps para created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holding_users');
    }
};
