<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrabajoBano extends Model
{
    protected $table = 'trabajo_bano';
    
    public function adultosMayoresTrabajoBano () {
        return $this->hasMany(AmTrabajoBano::class);
    }
}
