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
            $table->string('codigo_tributacao')->nullable();
            $table->string('razao_social2')->nullable();
            $table->string('razao_social3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tomadores_servicos', function (Blueprint $table) {
            $table->dropColumn('codigo_tributacao');
            $table->dropColumn('razao_social2');
            $table->dropColumn('razao_social3');
        });
    }
};
