<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstitucionSalud extends Model
{

    use SoftDeletes;
    protected $table = 'institucion_salud';
    protected $fillable = ['nombre', 'direccion', 'localidad'];
    
    public function adultosMayores () {
        return $this->hasMany(AdultoMayor::class);
    }
}
