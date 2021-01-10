<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nacionalidad extends Model
{
    use SoftDeletes;
    protected $table = 'nacionalidad';
    
    protected $fillable = ['nombre'];
    //  una nacionalidad puede tener uno o muchos adultos mayores - relación uno a muchos
    public function adultoMayor () {
        return $this->hasMany(AdultoMayor::class);
    }
}
