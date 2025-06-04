<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'desponibilite',
        'reduction',
        'admin_id'
    ];
    public function Admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
