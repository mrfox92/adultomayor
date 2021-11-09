<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscapacidadAm extends Model
{
    protected $table = 'discapacidad_am';
    protected $fillable = ['am_id', 'id_tipo_discapacidad', 'nombre', 'observacion', 'user_id'];
    
    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id');
    }

    public function tipoDiscapacidad () {
        return $this->belongsTo(TipoDiscapacidad::class, 'id_tipo_discapacidad')->select('id', 'nombre');
    }
}
