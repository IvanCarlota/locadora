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
        Schema::table('locacaos', function (Blueprint $table) {
            // Criamos o status 'ativo' por padrão
            $table->string('status')->default('ativo')->after('data_devolucao_prevista');
        });
    }

    public function down(): void
    {
        Schema::table('locacaos', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
