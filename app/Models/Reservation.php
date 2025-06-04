<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateDebut',
        'dateFin',
        'permis_front_path',
        'permis_back_path',
        'statut',
        'commentaires',
        'vehicule_id',
        'client_id',
        'admin_id',
        'offre_id'
    ];

    protected $casts = [
        'dateDebut' => 'date',
        'dateFin' => 'date',
        'statut' => 'string'
    ];

    const STATUS_PENDING = 'en_attente';
    const STATUS_CONFIRMED = 'confirmee';
    const STATUS_CANCELLED = 'annulee';

    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING => 'En attente',
            self::STATUS_CONFIRMED => 'Confirmée',
            self::STATUS_CANCELLED => 'Annulée'
        ];
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function isPending()
    {
        return $this->statut === self::STATUS_PENDING;
    }

    public function isConfirmed()
    {
        return $this->statut === self::STATUS_CONFIRMED;
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}
