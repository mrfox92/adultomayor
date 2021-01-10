<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{

    protected $table = 'atenciones';
    
    public function adultosMayoresAtenciones () {
        return $this->hasMany(AmAtencion::class);
    }
}
