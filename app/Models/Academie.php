<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academie extends Model
{
    protected $primaryKey = 'idAcademie';
    protected $fillable = ['nomAcademie', 'idRegion'];

    public function region()
    {
        return $this->belongsTo(Region::class, 'idRegion');
    }
}