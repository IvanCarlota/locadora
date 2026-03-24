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
        Schema::create('fitas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('genero');
            $table->integer('quantidade_disponivel')->default(1);
            $table->decimal('preco_locacao', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fitas');
    }
};
