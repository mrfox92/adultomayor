<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    protected $table = 'acompanante';
    protected $fillable = ['am_id', 'sexo_acompanante', 'edad', 'parentesco_am', 'estado_trabajo', 'user_id'];
                            
    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id')->select('id', 'rut', 'nombres', 'apellidos');
    }
}
