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
        Schema::table('tomadores_servicos', function (Blueprint $table) {
            $table->enum('situacao', ['adimplente', 'inadimplente', 'abandono de carrinho', 'abertura de empresa'])
                  ->default('adimplente')
                  ->after('nome_fantasia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tomadores_servicos', function (Blueprint $table) {
            $table->dropColumn('situacao');
        });
    }
};
