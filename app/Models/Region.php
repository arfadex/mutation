<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $primaryKey = 'idRegion';
    protected $fillable = ['nomRegion'];
}
