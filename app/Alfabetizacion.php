<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alfabetizacion extends Model
{

    use SoftDeletes;
    protected $table = 'alfabetizacion';

    protected $fillable = ['nombre'];

    public function adultosMayores () {
        return $this->hasMany(AdultoMayor::class);
    }
}
