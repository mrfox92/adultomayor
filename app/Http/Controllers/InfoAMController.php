<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdultoMayor;
use App\AmEtnia;
use App\Exports\AMExport;
use App\Exports\EtniasAMExport;
use App\Exports\TalleresAMExport;
use App\Exports\NucleoFamiliarExport;
use App\Exports\PrevisionesExport;
use App\Exports\TipoViviendasExport;
use App\Exports\AlfabetizacionExport;
use App\Exports\ActividadesExport;
use App\Exports\ProgramasExport;
use App\Exports\AyudasTecnicasExport;
use App\Exports\AtencionesExport;
use App\Exports\SexosExport;
use App\Exports\VacunadosExport;
use App\Exports\DiscapacidadesAmExport;
use App\Exports\InstitucionSaludExport;
use Maatwebsite\Excel\Facades\Excel;

class InfoAMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.informacion_am.index');
    }


    public function export () {

        return (new AMExport)->download('nacionalidades-adultos-mayores.xlsx');
    }

    public function instituciones () {

        return (new InstitucionSaludExport)->download('instituciones-salud-adultos-mayores.xlsx');
    }
    

    public function tipoviviendas ()
    {
        return (new TipoViviendasExport)->download('tipo-viviendas-adultos-mayores.xlsx');
    }

    

    public function alfabetizacion ()
    {
        return (new AlfabetizacionExport)->download('nivel-alfabetizacion-adultos-mayores.xlsx');
    }

    public function sexos ()
    {
        return (new SexosExport)->download('sexos-adultos-mayores.xlsx');
    }

    public function vacunados ()
    {
        return (new VacunadosExport)->download('vacunados-covid-19-adultos-mayores.xlsx');
    }

    public function etnias () {

        return (new EtniasAMExport)->download('etnias-adultos-mayores.xlsx');
    }

    public function previsiones () {

        return (new PrevisionesExport)->download('previsiones-adultos-mayores.xlsx');
    }

    public function talleres ()
    {
        return (new TalleresAMExport)->download('talleres-adultos-mayores.xlsx');
    }

    public function programas ()
    {
        return (new ProgramasExport)->download('programas-adultos-mayores.xlsx');
    }

    public function actividades ()
    {
        return (new ActividadesExport)->download('actividades-adultos-mayores.xlsx');
    }

    public function atenciones ()
    {
        return (new AtencionesExport)->download('atenciones-adultos-mayores.xlsx');
    }

    public function ayudastecnicas ()
    {
        return (new AyudasTecnicasExport)->download('ayudas-tecnicas-adultos-mayores.xlsx');
    }

    public function discapacidades ()
    {
        return (new DiscapacidadesAmExport)->download('tipo-discapacidad-adultos-mayores.xlsx');
    }

    public function nucleosfamiliares ()
    {
        return (new NucleoFamiliarExport)->download('nucleos-familiares-adultos-mayores.xlsx');
    }
}
