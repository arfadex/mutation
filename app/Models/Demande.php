<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $primaryKey = 'idDemande';
    protected $fillable = ['dateDem', 'idProfesseur', 'status', 'admin_notes'];

    public function professeur()
    {
        return $this->belongsTo(User::class, 'idProfesseur');
    }

    public function detailDemandes()
    {
        return $this->hasMany(DetailDemande::class, 'idDemande');
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'approved' => 'success',
            'rejected' => 'danger',
            default => 'secondary'
        };
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'pending' => 'En attente',
            'approved' => 'Approuvée',
            'rejected' => 'Rejetée',
            default => 'Inconnu'
        };
    }
}
