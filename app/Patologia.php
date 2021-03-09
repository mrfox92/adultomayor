<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patologia extends Model
{
    use SoftDeletes;
    protected $table = 'patologias';
    protected $fillable = ['nombre', 'descripcion'];
    
    public function adultosMayoresPatologias () {
        return $this->hasMany(AmPatologia::class);
    }
}
