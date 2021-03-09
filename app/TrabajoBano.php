<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrabajoBano extends Model
{
    use SoftDeletes;
    protected $table = 'trabajo_bano';
    protected $fillable = ['nombre', 'descripcion'];
    
    public function adultosMayoresTrabajoBano () {
        return $this->hasMany(AmTrabajoBano::class);
    }
}
