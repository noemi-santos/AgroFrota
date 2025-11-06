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
        Schema::create('locatariosdalocacao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->float('valor_individual');
            $table->enum('status_pagamento', ['Incompleto', 'Processando', 'Completo'])->default('Incompleto');

            // Foreign Keys
            $table->foreignId('locacao_id')->constrained('locacao')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('locatario_id')->constrained('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locatariosdalocacao');
    }
};
