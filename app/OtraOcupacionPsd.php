<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtraOcupacionPsd extends Model
{
    protected $table = 'otra_ocupacion_psd';
    protected $fillable = ['psd_id', 'nombre', 'direccion', 'email', 'telefono', 'cargo', 'encargado'];
    
    public function psd() {
        return $this->belongsTo(PersonaDiscapacitada::class, 'psd_id');
    }
}
