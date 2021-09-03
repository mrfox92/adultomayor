<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmRed extends Model
{

    protected $table = 'am_red';
    protected $fillable = ['am_id', 'red_id'];

    public function red () {
        return $this->belongsTo(Red::class);
    }

    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class);
    }
}
