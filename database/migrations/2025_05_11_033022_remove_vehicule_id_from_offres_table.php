<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('offres', function (Blueprint $table) {
        // Si une contrainte existe :
        $table->dropForeign(['vehicule_id']);
        $table->dropColumn('vehicule_id');
    });
}

public function down()
{
    Schema::table('offres', function (Blueprint $table) {
        $table->unsignedBigInteger('vehicule_id')->nullable();
        // Si tu veux remettre la relation :
        $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
    });
}

};
