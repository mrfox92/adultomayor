<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actividad extends Model
{

    use SoftDeletes;
    protected $table = 'actividades';
    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin'];
    
    public function adultosMayoresActividad () {
        return $this->hasMany(AmActividad::class);
    }
}
