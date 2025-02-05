<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Historial;
use App\Models\Paciente;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class FacturaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
       // $this->middleware('auth');
        //$this->middleware('can: Crear')->only('create');
        //$this->middleware(['role:administrator']);
        //funciono con role
        $this->middleware(['auth', 'role:administrator|secretaria']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $facturas = Factura::all();
        $valor_total = Factura::sum('monto');
        return view('facturas.index', compact('facturas', 'valor_total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        $doctores = Doctor::orderBy('apellidos','asc')->get();
        return view ('facturas.create', compact('pacientes', 'doctores'));
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
        $request->validate(
            [
                'monto'=>'required|numeric|min:0',
                'fecha_pago'=>'required',
                'descripcion'=> 'required',
            ]
        );

        $factura = new Factura();
        $factura ->monto = $request->monto;
        $factura ->fecha_pago = $request->fecha_pago;
        $factura ->descripcion = $request->descripcion;
        $factura ->paciente_id = $request->paciente_id;
        $factura ->doctor_id = $request->doctor_id;
        
        $factura ->save();
        //return to form
        return redirect()->route('facturas.index')
            ->with('success','Se registro la factura del paciente correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        
       $factura = Factura::findOrFail($id);
       
       return view('facturas.show', compact('factura'));
               
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $factura = Factura::findOrFail($id);
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        $doctores = Doctor::orderBy('apellidos','asc')->get();
        return view('facturas.edit',compact('factura','pacientes','doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
        //return "Listo para grabar";
        //$datos= request()->all();
        //return response()->json($datos);
        $request->validate(
            [
                'monto'=>'required|numeric|min:0',
                'fecha_pago'=>'required',
                'descripcion'=> 'required',
            ]
        );

       
        $factura ->monto = $request->monto;
        $factura ->fecha_pago = $request->fecha_pago;
        $factura ->descripcion = $request->descripcion;
        $factura ->paciente_id = $request->paciente_id;
        $factura ->doctor_id = $request->doctor_id;
        $factura ->save();
        //return to form
        return redirect()->route('facturas.index')
            ->with('success','Se actualizo la factura del paciente correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        //Busca en el modelo
        $factura = Factura::findOrFail($id);
        //Eliminar la factura asociada
        $factura->delete();
       
        //return back();
        return redirect()->back()->with('message', 'Factura médica del paciente eliminada con éxito.');
    }

    public function print_factura($id)
    {
        $factura = Factura::findOrFail($id);

        //logo
        $image = '/storage/images/logopcmh.png';

        // Cargar la vista del reporte y pasar los datos
        $pdf = PDF::loadView('facturas.print_factura', compact('factura' , 'image'))->setPaper('a4', 'portrait');

        // Crear el PDF con un nombre específico
        return $pdf->stream('Historial_Medico_'.$factura->id.'.pdf');
    }
}
