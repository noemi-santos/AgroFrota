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
        Schema::create('locacao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->boolean('tipo_locacao');
            $table->float('valor_total');
            $table->enum('status_equipamento', ['Aguardando', 'Em Transporte', 'Em Uso'])->default('Aguardando');
            $table->enum('status_pagamento', ['Incompleto', 'Parcial', 'Completo'])->default('Incompleto');
            // Foreign Keys
            $table->foreignId('equipamento_id')->constrained('equipamento')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('created_by')->constrained('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locacao');
    }
};
