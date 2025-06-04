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
    Schema::table('reservations', function (Blueprint $table) {
        $table->unsignedBigInteger('offre_id')->nullable()->after('vehicule_id');
        $table->foreign('offre_id')->references('id')->on('offres')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->dropForeign(['offre_id']);
        $table->dropColumn('offre_id');
    });
}

};
