<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoVivienda extends Model
{
    use SoftDeletes;
    protected $table = 'tipo_vivienda';
    protected $fillable = ['nombre', 'descripcion'];
    //  uno o muchos am tiene uno y solo un tipo de vivienda
    public function adultosMayores () {
        return $this->hasMany(AdultoMayor::class);
    }

    //  uno o muchas viviendas am tiene uno y solo un tipo de vivienda
    public function viviendasAdultosMayores() {
        return $this->hasMany(ViviendaAm::class);
    }
}
