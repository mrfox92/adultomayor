<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmAyudaTecnica extends Model
{
    protected $table = 'am_ayuda_tecnica';
    protected $fillable = ['am_id', 'ayuda_tecnica_id'];

    public function ayudaTecnica () {
        return $this->belongsTo(AyudaTecnica::class, 'ayuda_tecnica_id');
    }

    public  function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id');
    }
}
