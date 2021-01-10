<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patologia extends Model
{
    protected $table = 'patologias';
    
    public function adultosMayoresPatologias () {
        return $this->hasMany(AmPatologia::class);
    }
}
