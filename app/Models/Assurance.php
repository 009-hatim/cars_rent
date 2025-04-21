<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'couverts',
        'conditions',
        'vehicule_id'
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
}
