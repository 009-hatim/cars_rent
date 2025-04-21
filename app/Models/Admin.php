<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function recuperationRetours()
    {
        return $this->hasMany(RecuperationRetour::class);
    }
    public function offres()
    {
        return $this->hasMany(Offre::class);
    }
    public function Reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
