<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ViviendaAm extends Model
{
    use SoftDeletes;
    protected $table = 'vivienda_am';
    protected $fillable = ['am_id', 'id_tipo_vivienda', 'ocupacion_vivienda',
        'ocupacion_sitio', 'comparte_terreno', 'user_id',
    ];

    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id')->select('id', 'rut', 'nombres', 'apellidos');
    }

    public function tipoVivienda () {
        return $this->belongsTo(TipoVivienda::class, 'id_tipo_vivienda')->select('id', 'nombre', 'descripcion');
    }
}
