<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmPrograma extends Model
{
    protected $table = 'am_programa';
    protected $fillable = ['programa_id', 'am_id'];

    // programa
    public function programa () {
        return $this->belongsTo(Programa::class, 'programa_id');
    }
    
    //  am
    public function adultoMayor () {
        return $this->belongsTo(AdultoMayor::class, 'am_id');
    }
}
