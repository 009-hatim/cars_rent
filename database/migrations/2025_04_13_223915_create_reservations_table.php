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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // Dates de réservation
            $table->date('dateDebut');
            $table->date('dateFin');

            // Statut de la réservation
            $table->enum('statut', ['en_attente', 'confirmee', 'annulee'])->default('en_attente');

            // Fichiers permis de conduire
            $table->string('permis_front_path')->nullable();
            $table->string('permis_back_path')->nullable();

            // Clés étrangères
            $table->foreignId('vehicule_id')->constrained()->onDelete('cascade');
            $table->foreignId('client_id')->constrained()->onDelete('cascade');

            // Commentaires optionnels
            $table->text('commentaires')->nullable();

            // Timestamps
            $table->timestamps();

            // Index pour optimisation
            $table->index(['dateDebut', 'dateFin']);
            $table->index('statut');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
