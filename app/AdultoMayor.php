<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdultoMayor extends Model
{

    protected $table = 'adultos_mayores';
    // un am tiene una nacionalidad
    public function nacionalidad () {
        return $this->belongsTo(Nacionalidad::class);
    }

    // un adulto mayor tiene un tipo de vivienda

    public function tipoVivienda () {
        return $this->belongsTo(TipoVivienda::class);
    }
    //  un adulto de mayor tiene un tipo nucleo familiar

    public function nucleoFamiliar () {
        return $this->belongsTo(NucleoFamiliar::class);
    }

    public function alfabetizacion () {
        return $this->belongsTo(Alfabetizacion::class);
    }

    public function institutoSalud () {
        return $this->belongsTo(InstitucionSalud::class);
    }

    //  un adulto mayor es ingresado por un usuario
    public function users () {
        return $this->belongsTo(User::class);
    }

    // tabla relacion adulto mayor - ayuda tecnica
    public function amAyudasTecnicas () {
        return $this->hasMany(AmAyudaTecnica::class);
    }
    //  tabla relacion adulto mayor - taller
    public function adultosMayoresTalleres () {
        return $this->hasMany(AmTaller::class);
    }

    //  tabla relacion adulto mayor - ingreso
    public function adultosMayoresIngresos () {
        return $this->hasMany(AmIngreso::class);
    }

    //  tabla relacion adulto mayor - red
    public function adultosMayoresRedes () {
        return $this->hasMany(AmRed::class);
    }

    //  tabla relacion adulto mayor - patologia
    public function adultosMayoresPatologias () {
        return $this->hasMany(AmPatologia::class);
    }

    //  tabla relacion adulto mayor - etnia
    public function adultosMayoresEtnias () {
        return $this->hasMany(AmEtnia::class);
    }

    //   tabla relacion adulto mayor - actividad
    public function adultosMayoresActividad () {
        return $this->hasMany(AmActividad::class);
    }

    //  tabla relacion adulto mayor - atencion
    public function adultosMayoresAtenciones () {
        return $this->hasMany(AmAtencion::class);
    }

    //  tabla relacion adulto mayor - trabajo baño
    public function adultosMayoresTrabajoBano () {
        return $this->hasMany(AmTrabajoBano::class);
    }

    //  tabla relacion adulto mayor - discapacidad
    public function adultosMayoresDiscapacidades () {
        return $this->hasMany(AmDiscapacidad::class);
    }

    //  tabla relacion adulto mayor - servicio basico
    public function adultosMayoresServiciosBasicos () {
        return $this->hasMany(AmServicioBasico::class);
    }

    
}
