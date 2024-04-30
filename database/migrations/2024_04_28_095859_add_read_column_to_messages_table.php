<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('messages', function (Blueprint $table) {
        $table->boolean('read')->default(false); // Ajouter la colonne 'read' avec une valeur par défaut de false
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('read'); // Supprimer la colonne 'read' si la migration est annulée
        });
    }
};
