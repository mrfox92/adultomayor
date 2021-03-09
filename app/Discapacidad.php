<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discapacidad extends Model
{
    use SoftDeletes;
    protected $table = 'discapacidad';
    protected $fillable = ['nombre', 'descripcion', 'tipo_discapacidad_id'];

    public function tipoDiscapacidad () {
        return $this->belongsTo(TipoDiscapacidad::class, 'tipo_discapacidad_id')->select('id', 'nombre');
    }

    public function adultosMayoresDiscapacidades () {
        return $this->hasMany(AmDiscapacidad::class);
    }
}
