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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('path'); // Caminho do documento
            $table->string('descricao')->nullable(); // Descrição do documento
            $table->unsignedBigInteger('tomador_servico_id'); // Chave estrangeira
            $table->timestamps(); // Colunas created_at e updated_at

            // Relacionamento com a tabela tomadores_servico
            $table->foreign('tomador_servico_id')
                  ->references('id')
                  ->on('tomadores_servicos')
                  ->onDelete('cascade'); // Exclui os documentos se o tomador for excluído
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
