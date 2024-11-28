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
        Schema::create('socios', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->decimal('participacao', 5, 2); // Percentual de participação
            $table->string('cargo')->nullable(); // Cargo do sócio
            $table->timestamps();
        });

        // Tabela intermediária para o relacionamento muitos-para-muitos
        Schema::create('socio_tomador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('socio_id');
            $table->unsignedBigInteger('tomador_servico_id');
            $table->timestamps();

            $table->foreign('socio_id')
                  ->references('id')
                  ->on('socios')
                  ->onDelete('cascade');

            $table->foreign('tomador_servico_id')
                  ->references('id')
                  ->on('tomadores_servicos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socio_tomador');
        Schema::dropIfExists('socios');
    }
};
