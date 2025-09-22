<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('nota');
            $table->text('comentario');
            $table->string('estado_equipamento');
            $table->string('cumprimento_contrato');

            $table->foreignId('locacao_id')->constrained('locacao')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('locadores_id')->constrained('locatariosdalocacao')->onDelete('restrict')->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacoes');
    }
};
