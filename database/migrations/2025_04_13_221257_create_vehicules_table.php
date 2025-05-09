<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->integer('capacite');
            $table->text('options')->nullable();
            $table->boolean('disponibilite')->default(true);
            $table->decimal('tarif', 8, 2);
            $table->string('marque');
            $table->string('type_carburant'); // essence or diesel
            $table->integer('annee'); // manufacturing year
            $table->string('transmission'); // automatique or manuelle
            $table->integer('kilometrage');
            $table->integer('etoiles')->default(4); // rating (1-5 stars)
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
