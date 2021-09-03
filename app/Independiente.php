<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Independiente extends Model
{
    protected $table = 'independientes';
    protected $fillable = ['psd_id', 'nombre', 'direccion', 'email', 'telefono', 'cargo', 'encargado'];
    
    public function psd() {
        return $this->belongsTo(PersonaDiscapacitada::class);
    }
}
