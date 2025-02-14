<?php

namespace App\Http\Controllers;
use App\Models\Historial;
use App\Models\Paciente;
use App\Models\Buscar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BuscarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Buscar $buscar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buscar $buscar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buscar $buscar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buscar $buscar)
    {
        //
    }
    /**
     * Traer paciente.
     */
    public function buscar_paciente(Request $request)
    {
        $ci = $request->ci;
        $paciente = Paciente::where('ci',$ci)->first();

        return view ('reportes.buscar_paciente', compact('paciente'));
    }
    /**
     * Print historiales.
     */
    public function print_historial($id)
    {
        $paciente = Paciente::find($id);
        $historiales = Historial::where('paciente_id',$id)->get();


        //logo
        $image = '/storage/images/logopcmh.png';

        // Cargar la vista del reporte y pasar los datos
        $pdf = PDF::loadView('reportes.print_historial', compact('historiales', 'paciente' , 'image'))->setPaper('a4', 'portrait');

        // Crear el PDF con un nombre específico
        return $pdf->stream('Historial_Medico_'.$paciente->id.'.pdf');
    }
}
