<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lycee extends Model
{
    protected $primaryKey = 'idLycee';
    protected $fillable = ['nomLycee', 'ville', 'idAcademie'];

    public function academie()
    {
        return $this->belongsTo(Academie::class, 'idAcademie');
    }
}
