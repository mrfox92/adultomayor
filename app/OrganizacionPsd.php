<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizacionPsd extends Model
{
    protected $table = 'organizacion_psd';
    protected $fillable = ['psd_id', 'nombre', 'direccion', 'email', 'telefono', 'cargo', 'encargado'];

    public function psd() {
        return $this->belongsTo(PersonaDiscapacitada::class, 'psd_id');
    }

}
