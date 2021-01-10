<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taller extends Model
{

    use SoftDeletes;
    protected $table = 'talleres';
    protected $fillable = ['tipo_taller_id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin'];
    protected $dates = ['deleted_at'];
    
    //  es necesario especificar como segundo argumento la foreign key para poder utilizar el metodo
    public function tipotaller () {
        return $this->belongsTo(TipoTaller::class, 'tipo_taller_id')->select('id', 'nombre');;
    }

    public function adultosMayoresTalleres () {
        return $this->hasMany(AmTaller::class);
    }

}
