<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecuperationRetour extends Model
{
    use HasFactory;

    protected $fillable =[
        'procedures',
        'heuresOuverture',
    ];
    public function Admin(){
        return $this->belongsTo(Admin::class);
    }
}
