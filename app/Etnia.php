<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etnia extends Model
{

    use SoftDeletes;
    protected $table = 'etnias';
    protected $fillable = ['nombre', 'descripcion'];
    
    public function adultosMayoresEtnias () {
        return $this->hasMany(AmEtnia::class);
    }
}
