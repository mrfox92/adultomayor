<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HabitabilidadVivienda extends Model
{
    use SoftDeletes;
    protected $table = 'habitabilidad_vivienda';
    protected $fillable = ['am_id', 'fuente_calefaccion', 'estado_piso', 'estado_muros', 'estado_techos',
            'num_dormitorios', 'camas_cada_integrante', 'seguridad_vivienda', 'user_id',
    ];

    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id')->select('id', 'rut', 'nombres', 'apellidos');
    }
    
}
