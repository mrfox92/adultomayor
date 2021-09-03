<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    protected $table = 'ocupaciones';
    protected $fillable = ['nombre', 'obs_ocupacion'];
    
    
}
