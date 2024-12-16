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
        // Adicionar a coluna foto_perfil na tabela users
        Schema::table('users', function (Blueprint $table) {
            $table->string('foto_perfil')->nullable()->after('password'); // Coluna de string que pode ser nula
        });

        // Adicionar a coluna foto_perfil na tabela holding_users
        Schema::table('holding_users', function (Blueprint $table) {
            $table->string('foto_perfil')->nullable()->after('password'); // Coluna de string que pode ser nula
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remover a coluna foto_perfil da tabela users
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('foto_perfil');
        });

        // Remover a coluna foto_perfil da tabela holding_users
        Schema::table('holding_users', function (Blueprint $table) {
            $table->dropColumn('foto_perfil');
        });
    }
};
