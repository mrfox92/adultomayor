<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Atencion extends Model
{

    use SoftDeletes;
    protected $table = 'atenciones';
    protected $fillable = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin'];
    
    public function adultosMayoresAtenciones () {
        return $this->hasMany(AmAtencion::class);
    }
}
