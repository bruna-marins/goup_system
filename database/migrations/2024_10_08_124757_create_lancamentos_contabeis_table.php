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
        Schema::create('lancamentos_contabeis', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->decimal('valor', 15, 2);
            $table->enum('tipo', ['debito', 'credito']);
            $table->foreignId('conta_id')->constrained('contas_contabeis')->onDelete('cascade');
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lancamentos_contabeis');
    }
};
