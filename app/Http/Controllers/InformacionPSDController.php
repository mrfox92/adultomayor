<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\NacionalidadesPsdExport;
use App\Exports\BeneficiosPsdExport;
use App\Exports\EstablecimientosExport;
use App\Exports\DependientesExport;
use App\Exports\IndependientesExport;
use App\Exports\OtraOcupacionExport;
use App\Exports\PensionesExport;
use App\Exports\DiscapacidadPsdExport;
use App\Exports\SexosPsdExport;

class InformacionPSDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.informacion_psd.index');
    }

    public function nacionalidades () {

        return (new NacionalidadesPsdExport)->download('nacionalidades-psd.xlsx');
    }

    public function beneficios () {

        return (new BeneficiosPsdExport)->download('beneficios-estatales-psd.xlsx');
    }

    public function pensiones () {

        return (new PensionesExport)->download('pensiones-psd.xlsx');
    }

    public function establecimientos () {

        return (new EstablecimientosExport)->download('estudiantes-psd.xlsx');
    }

    public function dependientes () {

        return (new DependientesExport)->download('dependientes-psd.xlsx');
    }

    public function independientes () {

        return (new IndependientesExport)->download('independientes-psd.xlsx');
    }

    public function otras () {

        return (new OtraOcupacionExport)->download('otras-actividades-psd.xlsx');
    }

    public function discapacidades () {

        return (new DiscapacidadPsdExport)->download('tipo-discapacidades-psd.xlsx');
    }

    public function sexos () {

        return (new SexosPsdExport)->download('sexos-psd.xlsx');
    }
    

  
}
