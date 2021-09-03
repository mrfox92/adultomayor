<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonaDiscapacitada extends Model
{
    use SoftDeletes;
    protected $table = 'personas_discapacitadas';
    protected $fillable = ['rut', 'num_documento', 'nombres', 'apellidos', 'fecha_nacimiento', 'direccion',
        'telefono', 'nacionalidad_id', 'sexo', 'sociedad_civil', 'obs_sociedad_civil', 'recibe_pension', 'picture', 'user_id'
    ];

    //  reconstruimos la ruta de las imagenes
    public function pathAttachment () {
        return "/images/psd/" . $this->picture;
    }

    public function establecimientoEducacional ()  {
        return $this->hasMany(EstablecimientoEducacional::class);
    }

    public function organizacionPsd () {
        return $this->hasMany(OrganizacionPsd::class);
    }
    
    public function nacionalidad () {
        return $this->belongsTo(Nacionalidad::class, 'nacionalidad_id');
    }

    public function otraOcupacionPsd () {
        return $this->hasMany(OtraOcupacionPsd::class);
    }
    
    
}
