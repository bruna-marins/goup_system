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
        Schema::create('contas_contabeis', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_conta', 20)->unique();
            $table->string('descricao');
            $table->enum('tipo', ['ativo', 'passivo', 'receita', 'despesa', 'patrimonio_liquido']);
            $table->integer('nivel')->default(1);  // Define a hierarquia das contas
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contas_contabeis');
    }
};
