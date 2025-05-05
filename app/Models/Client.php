<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'user_id',
        'tel',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
