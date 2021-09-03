<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeneficioEstatal extends Model
{
    protected $table = 'beneficios_estatales';
    protected $fillable = ['nombre', 'descripcion'];
}
