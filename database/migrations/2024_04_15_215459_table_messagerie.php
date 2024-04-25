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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_expediteur');
            $table->unsignedBigInteger('id_destinataire');
            $table->text('contenu');
            $table->timestamps();

            $table->foreign('id_expediteur')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('id_destinataire')->references('id')->on('utilisateurs')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
