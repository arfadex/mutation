<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailDemande extends Model
{
    protected $table = 'detail_demandes';
    protected $fillable = ['idDemande', 'idLycee', 'numOrdre'];
    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class, 'idDemande');
    }

    public function lycee()
    {
        return $this->belongsTo(Lycee::class, 'idLycee');
    }
}
