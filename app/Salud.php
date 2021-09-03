<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salud extends Model
{
    protected $table = 'salud';
    protected $fillable = [ 'am_id', 'estado_salud', 'inscrito_centro_salud', 'controles_salud',
        'dependencia_severa', 'user_id',
    ];

    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id')->select('id', 'rut', 'nombres', 'apellidos');
    }
}
