<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acompanante extends Model
{
    use SoftDeletes;
    protected $table = 'acompanante';
    protected $fillable = ['am_id', 'acompanante_am', 'sexo_acompanante', 'edad', 'parentesco_am',
                            'estado_trabajo', 'user_id'];
                            
    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id')->select('id', 'rut', 'nombres', 'apellidos');
    }
}
