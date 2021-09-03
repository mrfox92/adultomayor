<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmAtencion extends Model
{

    protected $table = 'am_atencion';
    protected $fillable = ['am_id', 'atencion_id', 'obs_atencion', 'fecha_atencion'];

    public function atencion () {
        return $this->belongsTo(Atencion::class, 'atencion_id');
    }

    public function adultomayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id');
    }

}
