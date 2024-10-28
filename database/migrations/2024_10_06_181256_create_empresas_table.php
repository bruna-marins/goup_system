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
            $table->string('telefone'); // Telefone de contato
            $table->text('site')->nullable();
            $table->string('email')->unique(); // Email da empresa
            $table->string('nome_fantasia');
            $table->date('data_abertura');
            $table->string('inscricao_municipal');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->text('complemento')->nullable();
            $table->string('cnae');
            $table->string('capital_social');
            $table->string('faturamento_anual');
            $table->string('responsavel_contabil');
            $table->string('codigo_tributacao');
            $table->string('aliquota_fiscais');
            $table->string('socio');
            $table->string('cpf');
            $table->string('participacao_societaria');
            $table->string('cargo');
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
