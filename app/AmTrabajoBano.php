<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmTrabajoBano extends Model
{
    protected $table = 'am_trabajo_bano';
    protected $fillable = ['am_id', 'trabajo_bano_id', 'obs_trabajo_bano', 'fecha_trabajo_bano'];

    public function trabajoBano () {
        return $this->belongsTo(TrabajoBano::class, 'trabajo_bano_id')->select('id', 'nombre', 'descripcion');
    }

    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class);
    }

}
