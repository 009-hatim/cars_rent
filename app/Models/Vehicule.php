<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'capacite',
        'options',
        'disponibilite',
        'tarif',
        'marque',
        'type_carburant',
        'annee',
        'transmission',
        'kilometrage',
        'etoiles',
        'admin_id'
    ];

    // Relationships
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function assurance()
    {
        return $this->hasOne(Assurance::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
