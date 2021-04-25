<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscapacidadAm extends Model
{
    protected $table = 'discapacidad_am';
    protected $fillable = ['am_id', 'id_tipo_discapacidad', 'nombre', 'observacion', 'user_id'];
    
    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id')->select('id', 'rut', 'nombres', 'apellidos');
    }

    public function tipoDiscapacidad () {
        return $this->belongsTo(tipoDiscapacidad::class, 'id_tipo_discapacidad')->select('id', 'nombre');
    }
}
