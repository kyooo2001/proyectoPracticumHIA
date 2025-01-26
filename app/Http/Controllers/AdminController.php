<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $this->middleware('auth');
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();
        $consultorios = Consultorio::all();
        $horarios = Horario::all();
        $doctores = Doctor::all();
        $eventos = Event::all();
        return view('home', compact('total_usuarios', 'total_secretarias', 'total_pacientes','total_consultorios', 'total_doctores','total_horarios','consultorios', 'horarios', 'doctores', 'eventos'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
