<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicioBasico extends Model
{
    use SoftDeletes;
    protected $table = 'servicios_basicos';
    protected $fillable = ['nombre', 'descripcion'];
    
    public function adultosMayoresServiciosBasicos () {
        return $this->hasMany(AmServicioBasico::class);
    }
    
}
