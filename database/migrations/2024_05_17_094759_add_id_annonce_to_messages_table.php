<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('id_annonce')->nullable()->after('id_destinataire');
            $table->foreign('id_annonce')->references('id')->on('annonces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['id_annonce']);
            $table->dropColumn('id_annonce');
        });
    }
};
