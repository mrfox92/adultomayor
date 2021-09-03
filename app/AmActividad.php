<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmActividad extends Model
{
    protected $table = 'am_actividad';
    protected $fillable = ['actividad_id', 'am_id'];

    public function actividad () {
        return $this->belongsTo(Actividad::class, 'actividad_id');
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id');
    }

}
