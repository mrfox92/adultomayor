<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Red extends Model
{
    use SoftDeletes;
    protected $table = 'redes';

    protected $fillable = ['nombre', 'num_contacto'];

    public function adultosMayoresRedes () {
        return $this->hasMany(AmRed::class);
    }
}
