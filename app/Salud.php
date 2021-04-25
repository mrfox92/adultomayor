<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salud extends Model
{
    use SoftDeletes;
    protected $table = 'salud';
    protected $fillable = [ 'am_id', 'estado_salud', 'inscrito_centro_salud',
        'controles_salud', 'dependencia_severa', 'user_id',
    ];

    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id')->select('id', 'rut', 'nombres', 'apellidos');
    }
}
