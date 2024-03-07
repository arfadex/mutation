<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $primaryKey = 'idDemande';
    protected $fillable = ['dateDem', 'idProfesseur'];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'idProfesseur');
    }
}
