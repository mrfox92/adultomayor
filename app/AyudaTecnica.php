<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AyudaTecnica extends Model
{
    use SoftDeletes;
    protected $table = 'ayudas_tecnicas';
    protected $fillable = ['nombre', 'descripcion'];

    public function amAyudasTecnicas () {
        
        return $this->hasMany(AmAyudaTecnica::class);
    }
}
