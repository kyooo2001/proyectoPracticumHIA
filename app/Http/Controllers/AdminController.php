<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\User;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Event;
use App\Models\Factura;
use Carbon\Carbon;
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
        
        $total_usuarios = User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();
        $total_eventos = Event::count();
        $consultorios = Consultorio::all();
        $horarios = Horario::all();
        $doctores = Doctor::all();
        $eventos = Event::all();
           // Obtener el conteo de usuarios registrados por mes
                $usersByMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            // Crear etiquetas y datos para el gráfico de usuarios
            $labels = $usersByMonth->map(function ($item) {
                return Carbon::create()->month($item->month)->format('F');
            });

            $data = $usersByMonth->pluck('count');
            // Obtener el conteo de pacientes registrados por mes
            $patientsByMonth = Paciente::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

            // Crear etiquetas y datos para el gráfico de pacientes
            $labels = $patientsByMonth->map(function ($item) {
                return Carbon::create()->month($item->month)->format('F');
            });

            $data = $patientsByMonth->pluck('count');

            // Obtener el conteo de eventos registrados por mes
                $eventsByMonth = Event::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            // Crear etiquetas y datos para el gráfico
            $labels = $eventsByMonth->map(function ($item) {
                return Carbon::create()->month($item->month)->format('F');
            });

            $data = $eventsByMonth->pluck('count');
       

        return view('home', compact('total_usuarios', 'total_secretarias', 'total_pacientes','total_consultorios', 'total_doctores','total_horarios', 'total_eventos','consultorios', 'horarios', 'doctores', 'eventos', 'labels', 'data'));

     

    }

    /**
     * Show the viewform for listaReserva
     */
    public function listaReserva($id)
    {
        //
        $eventos = Event::where('user_id', $id)->get();
        return view('reservas.listaReserva', compact('eventos'));
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
