<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'programas';
    protected $fillable = ['nombre', 'descripcion', 'objetivo', 'requisitos'];

    public function adultosMayoresPrograma () {
        return $this->hasMany(AmPrograma::class);
    }

}
