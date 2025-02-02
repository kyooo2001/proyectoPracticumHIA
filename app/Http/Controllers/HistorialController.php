<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Paciente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $historiales = Historial::with('paciente', 'doctor')->get();
        return view('historiales.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        return view('historiales.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //return "Listo para grabar";
        //$datos= request()->all();
        //return response()->json($datos);
        $historial = new Historial();
        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctor->id;
        $historial->save();
        //return to form
        return redirect()->route('historiales.index')
            ->with('success','Se registro el historial médico del paciente correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
     
       //
       $historial = Historial::findOrFail($id);
       
        return view('historiales.show', compact('historial'));
        
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $historial = Historial::findOrFail($id);
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        return view('historiales.edit',compact('historial','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        //return "Listo para grabar";
        //$datos= request()->all();
        //return response()->json($datos);
        $historial = Historial::find($id);
        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctor->id;
        $historial->save();
        //return to form
        return redirect()->route('historiales.index')
            ->with('success','Se actualizo el historial médico del paciente correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        //Busca en el modelo
        $historial = Historial::findOrFail($id);
        //Eliminar al historial asociado
        $historial->delete();
       
        //return back();
        return redirect()->back()->with('message', 'Historial médico eliminado con éxito.');
    }

    
    /**
     * Print the specified resource from storage.
     */
    public function reporteh($id)
    {
        $historial = Historial::findOrFail($id);

        //logo
        $image = '/storage/images/logopcmh.png';

        // Cargar la vista del reporte y pasar los datos
        $pdf = PDF::loadView('historiales.reporteh', compact('historial' , 'image'))->setPaper('a4', 'portrait');

        // Crear el PDF con un nombre específico
        return $pdf->stream('Historial_Medico_'.$historial->id.'.pdf');
    }

    
    
}
