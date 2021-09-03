<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmTaller extends Model
{
    protected $table = 'am_taller';
    protected $fillable = ['taller_id', 'am_id'];
    
    
    // taller
    public function taller () {
        return $this->belongsTo(Taller::class, 'taller_id');
    }
    
    //  am
    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id');
    }
}
