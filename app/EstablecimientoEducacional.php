<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstablecimientoEducacional extends Model
{
    protected $table = 'establecimiento_educacional';
    protected $fillable = ['psd_id', 'nombre', 'direccion', 'email', 'telefono',
        'encargado', 'curso_actual', 'profesor', 'programa_pie'
    ];

    public function psd() {
        return $this->belongsTo(PersonaDiscapacitada::class, 'psd_id');
    }
}
