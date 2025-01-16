<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Consultorio;
use Illuminate\Http\Request;

class HorarioController extends Controller
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
        // LLamar al modelo relacionado con doctor y consultorio
        $horarios = Horario::with('doctor','consultorio')->get();
        return view('horarios.index',compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Traer la lista de doctores
        $doctores = Doctor::all();
        // Traer lista de consultorios
        $consultorios = Consultorio::all();
        return view('horarios.create',compact('doctores','consultorios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //**View data sending to db
       //return "Listo para grabar";
       //$datos= request()->all();
       //return response()->json($datos);

       $request->validate([
        'dia'=>'required',
        'hora_inicio'=>'required',
        'hora_final'=>'required',
       
    ]);

        Horario::create($request->all());
        //return to form
        return redirect()->route('horarios.index')
            ->with('mensaje','Horario registrado correctamente');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // trae informacion de la tabla doctor y consultorio
        $horarios = Horario::find($id);
        return view('horarios.show',compact('horarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
