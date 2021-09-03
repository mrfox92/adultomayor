<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscapacidadPsd extends Model
{
    protected $table = 'discapacidad_psd';
    protected $fillable = ['psd_id', 'tipo_discapacidad_id', 'nombre', 'observacion', 'porcentaje_discapacidad', 'picture'];

    //  reconstruimos la ruta de las imagenes
    public function pathAttachment () {
        return "/images/discapacidadpsd/" . $this->picture;
    }
    
    public function psd () {
        return $this->belongsTo(PersonaDiscapacitada::class, 'psd_id');
    }

    public function tipoDiscapacidad () {
        return $this->belongsTo(tipoDiscapacidad::class, 'tipo_discapacidad_id')->select('id', 'nombre');
    }
    
}
