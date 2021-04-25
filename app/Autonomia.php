<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autonomia extends Model
{

    use SoftDeletes;

    protected $table = 'autonomia';

    protected $fillable = [
        'levantarse_sin_ayuda', 'cama_aseo_dormitorio', 'asearse_ducharse', 'vestirse', 'peinarse',
        'lavarse_dientes', 'utilizar_wc', 'desplazamiento_dentro_casa', 'comer_solo', 'tomarse_medicamentos',
        'salir_calle', 'realizar_compras', 'uso_medios_transporte', 'medico_controles_salud', 'colaborar_tareas_hogar',
        'user_id','am_id',
    ];

    //  una ficha autonomia am pertenece a un adulto mayor

    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id')->select('id', 'rut', 'nombres', 'apellidos');
    }

}
