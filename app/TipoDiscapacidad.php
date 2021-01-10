<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDiscapacidad extends Model
{
    protected $table = 'tipo_discapacidad';
    
    public function discapacidades () {
        return $this->hasMany(Discapacidad::class);
    }
}
