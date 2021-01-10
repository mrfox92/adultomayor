<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoTaller extends Model
{
    use SoftDeletes;
    protected $table = 'tipo_taller';
    protected $fillable = ['nombre', 'descripcion'];

    public function talleres () {
        return $this->hasMany(Taller::class);
    }
}
