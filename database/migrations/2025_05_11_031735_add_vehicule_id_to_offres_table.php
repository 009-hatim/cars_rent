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
    Schema::table('offres', function (Blueprint $table) {
        $table->unsignedBigInteger('vehicule_id')->nullable()->after('id');
        $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('offres', function (Blueprint $table) {
        $table->dropForeign(['vehicule_id']);
        $table->dropColumn('vehicule_id');
    });
}

};
