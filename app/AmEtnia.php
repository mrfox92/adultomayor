<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmEtnia extends Model
{
    protected $table = 'am_etnia';
    protected $fillable = ['adulto_mayor_id', 'etnia_id', 'created_at', 'updated_at'];

    public function etnia () {
        return $this->belongsTo(Etnia::class, 'etnia_id')->select('id', 'nombre', 'descripcion');
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class, 'adulto_mayor_id');
    }
}
