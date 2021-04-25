<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDiscapacidad extends Model
{
    use SoftDeletes;
    protected $table = 'tipo_discapacidad';
    protected $fillable = ['nombre'];
    
    public function discapacidades () {
        return $this->hasMany(DiscapacidadAm::class);
    }
}
