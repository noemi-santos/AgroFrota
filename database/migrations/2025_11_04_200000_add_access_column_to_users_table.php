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
        // Só adiciona a coluna se ela ainda não existir (protege contra rodar duas vezes)
        if (!Schema::hasColumn('users', 'access')) {
            Schema::table('users', function (Blueprint $table) {
                // adiciona enum com valores 'ADM' e 'CLI', default CLI
                $table->enum('access', ['ADM', 'CLI'])->default('CLI')->after('password');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'access')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('access');
            });
        }
    }
};
