<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
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
  
   
        $pacientes = Paciente::all();
        return view('pacientes.index',compact('pacientes'));
        
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pacientes.create');
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
            'nombres'=>'required|max:150',
            'apellidos'=>'required|max:150',
            'ci'=>'required|numeric|digits:10|min:1000000000|unique:pacientes',
            'celular'=>'required|numeric',
            'correo'=>'required|max:150|unique:pacientes',
            'seguro_medico'=>'max:255',
            'fecha_nacimiento'=>'required',
            'genero'=>'required|max:150',
            'grupo_sanguineo'=>'required|max:150',
            'alergias'=>'required|max:150',
            'ciudad'=>'required|max:150',
            'provincia'=>'required|max:150',
            'direccion'=>'required|max:255',
            'contacto_emergencia'=>'required|max:255',
            'observaciones'=>'max:500',
    
        ]);

        $paciente = new Paciente();
        $paciente->nombres= $request->nombres;
        $paciente->apellidos= $request->apellidos;
        $paciente->ci= $request->ci;
        $paciente->celular= $request->celular;
        $paciente->correo =$request->correo;
        $paciente->seguro_medico =$request->seguro_medico;
        $paciente->fecha_nacimiento= $request->fecha_nacimiento;
        $paciente->genero =$request->genero;
        $paciente->grupo_sanguineo =$request->grupo_sanguineo;
        $paciente->alergias =$request->alergias;
        $paciente->ciudad= $request->ciudad;
        $paciente->provincia= $request->provincia;
        $paciente->direccion= $request->direccion;
        $paciente->contacto_emergencia =$request->contacto_emergencia;
        $paciente->observaciones =$request->observacioens;


        $paciente->save();

       
        //return to form
        return redirect()->route('pacientes.index')
            ->with('mensaje','Paciente registrado correctamente');



    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        //return $id;
        $paciente= Paciente::findOrFail($id);

        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //


        $paciente= Paciente::find($id);
     
    
        $request->validate([
            'nombres'=>'required|max:150',
            'apellidos'=>'required|max:150',
            'ci'=>'required|numeric|digits:10|min:1000000000|unique:pacientes,ci,'.$paciente->id,
            'celular'=>'required|numeric',
            'correo'=>'required|max:150|unique:pacientes,correo,'.$paciente->id,
            'seguro_medico'=>'max:255',
            'fecha_nacimiento'=>'required',
            'grupo_sanguineo'=>'required|max:150',
            'alergias'=>'required|max:150',
            'ciudad'=>'required|max:150',
            'provincia'=>'required|max:150',
            'direccion'=>'required|max:255',
            'contacto_emergencia'=>'required|max:255',
            'observaciones'=>'max:500',
    
        ]);
            $paciente->nombres= $request->nombres;
            $paciente->apellidos= $request->apellidos;
            $paciente->ci= $request->ci;
            $paciente->celular= $request->celular;
            $paciente->correo =$request->correo;
            $paciente->seguro_medico =$request->seguro_medico;
            $paciente->fecha_nacimiento= $request->fecha_nacimiento;
            $paciente->genero =$request->genero;
            $paciente->grupo_sanguineo =$request->grupo_sanguineo;
            $paciente->alergias =$request->alergias;
            $paciente->ciudad= $request->ciudad;
            $paciente->provincia= $request->provincia;
            $paciente->direccion= $request->direccion;
            $paciente->contacto_emergencia =$request->contacto_emergencia;
            $paciente->observaciones =$request->observacioens;


            $paciente->save();
        //return route
        return redirect()->route('pacientes.index')
            ->with('mensaje','Datos del paciente actualizados correctamente')
            ->with ('success');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        //$paciente = Paciente::findOrFail($id);
        //$paciente->delete();
        //return back();
        Paciente::destroy($id);
        return redirect()->back()->with('message', 'Registro eliminado con éxito.');
    }
}
