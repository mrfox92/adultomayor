<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AyudaTecnica extends Model
{
    protected $table = 'ayudas_tecnicas';

    public function amAyudasTecnicas () {
        
        return $this->hasMany(AmAyudaTecnica::class);
    }
}
