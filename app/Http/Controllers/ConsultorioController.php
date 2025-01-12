<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $consultorios = Consultorio::all();
        return view('consultorios.index',compact('consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('consultorios.create');
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

        $request->validate([
            'nombre'=>'required|max:150',
            'especialidad'=>'required|max:150',
            'estado'=>'max:255',
            'telefono'=>'required|numeric',
            'capacidad'=>'required',
        ]);
        //Crea los datos en la tabla consultorio
        Consultorio::create($request->all());
        //return to form
        return redirect()->route('consultorios.index')
            ->with('mensaje','Consultorio registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $consultorio= Consultorio::findOrFail($id);

        return view('consultorios.show', compact('consultorio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $consultorio= Consultorio::findOrFail($id);

        return view('consultorios.edit', compact('consultorio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre'=>'required|max:150',
            'especialidad'=>'required|max:150',
            'estado'=>'max:255',
            'telefono'=>'required|numeric',
            'capacidad'=>'required',
        ]);
        //Buscar en la tabla por id
        $consultorio = Consultorio::find($id);
        //Actualizar los datos en la tabla consultorio
        $consultorio->update($request->all());
        //return to form
        return redirect()->route('consultorios.index')
            ->with('mensaje','Datos del consultorio actualizados correctamente')
            ->with ('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy ($id)
    {
        //Busca en el modelo
        $consultorio = Consultorio::findOrFail($id);
        //Eliminar consultorio
       
        $consultorio->delete();
        //return back();
        return redirect()->back()->with('message', 'Registro eliminado con éxito.');
    }
    
}
