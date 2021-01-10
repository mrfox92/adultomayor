<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NucleoFamiliar extends Model
{
    use SoftDeletes;
    protected $table = 'nucleo_familiar';
    protected $fillable = ['nombre', 'descripcion'];
    //  un adulto mayor pertenece a un tipo nucleo familiar, uno o muchos adultos mayores pertenecen
    //   a uno o muchos nucleos familiares

    public function adultosMayores () {
        return $this->hasMany(AdultoMayor::class);
    }
    
}
