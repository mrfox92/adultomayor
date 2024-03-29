<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdultoMayor extends Model
{
    use SoftDeletes;
    protected $table = 'adultos_mayores';
    protected $fillable = ['rut', 'num_documento', 'nombres', 'apellidos', 'fecha_nacimiento', 'sexo', 'direccion',
    'telefono','nacionalidad_id','alfabetizacion_id','porcentaje_rsh','estado_club_am','tipo_vivienda_id',
    'nucleo_familiar_id', 'institucion_salud_id', 'recibe_medicamentos','obs_medicamentos','emprendimiento','obs_emprendimiento',
    'atencion_panales','obs_atencion_panales','postrado','obs_postrado','habitabilidad_casa','obs_hab_casa',
    'postulacion_fosis','obs_fosis','fecha_postulacion_fosis', 'cuidado_ninos', 'cuidado_psd', 'inscripcion_conadi',
    'vacunado', 'obs_vacunado', 'controles_dia', 'obs_controles', 'picture', 'user_id'];


    //  reconstruimos la ruta de las imagenes
    public function pathAttachment () {
        return "/images/am/" . $this->picture;
    }
    
    // un am tiene una nacionalidad
    public function nacionalidad () {
        return $this->belongsTo(Nacionalidad::class, 'nacionalidad_id')->select('id', 'nombre');
    }

    // un adulto mayor tiene un tipo de vivienda

    public function tipoVivienda () {
        return $this->belongsTo(TipoVivienda::class, 'tipo_vivienda_id');
    }
    //  un adulto de mayor tiene un tipo nucleo familiar

    public function nucleoFamiliar () {
        return $this->belongsTo(NucleoFamiliar::class, 'nucleo_familiar_id');
    }

    public function institucionSalud () {
        return $this->belongsTo(InstitucionSalud::class, 'institucion_salud_id');
    }

    public function alfabetizacion () {
        return $this->belongsTo(Alfabetizacion::class, 'alfabetizacion_id');
    }

    //  un adulto mayor es ingresado por un usuario
    public function users () {
        return $this->belongsTo(User::class, 'user_id');
    }

    // tabla relacion adulto mayor - ayuda tecnica
    public function amAyudasTecnicas () {
        return $this->hasMany(AmAyudaTecnica::class);
    }

    // tabla relacion adulto mayor - ayuda tecnica
    public function amEtnias () {
        return $this->hasMany(AmEtnia::class);
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

    
    //  tabla relacion adulto mayor - servicio basico
    public function adultosMayoresServiciosBasicos () {
        return $this->hasMany(AmServicioBasico::class);
    }
    
    //  fichas de autonomia adulto mayor
    
    public function autonomias () {
        return $this->hasMany(Autonomia::class);
    }
    
    public function acompanantes () {
        return $this->hasMany(Acompanante::class);
    }
    
    public function habitabilidadVivienda ()  {
        return $this->hasMany(HabitabilidadVivienda::class);
    }
    
    public function salud ()  {
        return $this->hasMany(Salud::class);
    }

    //  tabla relacion adulto mayor - discapacidad
    public function adultosMayoresDiscapacidades () {
        return $this->hasMany(DiscapacidadAm::class);
    }

    // public function amTaller () {
    //     return $this->hasMany(AmTaller::class);
    // }

    
}
