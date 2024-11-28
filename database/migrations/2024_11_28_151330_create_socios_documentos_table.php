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
        Schema::create('socios_documentos', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('caminho'); // Caminho do documento
            $table->string('descricao')->nullable(); // Descrição do documento
            $table->unsignedBigInteger('socio_id'); // Chave estrangeira
            $table->timestamps();

            $table->foreign('socio_id')
                  ->references('id')
                  ->on('socios')
                  ->onDelete('cascade'); // Exclui os documentos se o sócio for excluído
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socios_documentos');
    }
};
