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
        Schema::table('holdings', function (Blueprint $table) {
            $table->enum('natureza_juridica', ['MEI', 'EI', 'Ltda.', 'SS', 'SA', 'SLU']);
            $table->enum('regime_tributario', ['Simples Nacional', 'Lucro Presumido', 'Lucro Real'])->default('Simples Nacional');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('holdings', function (Blueprint $table) {
            $table->dropColumn('natureza_juridica');
            $table->dropColumn('regime_tributario');
        });
    }
};
