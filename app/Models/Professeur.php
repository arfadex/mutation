<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Authenticatable
{
    protected $primaryKey = 'idProfesseur';
    protected $fillable = ['nom', 'prenom', 'dateN', 'email', 'pass', 'dateAffLycee', 'etatCivil', 'nEnfants', 'idLycee'];

    public function lycee()
    {
        return $this->belongsTo(Lycee::class, 'idLycee');
    }
}
