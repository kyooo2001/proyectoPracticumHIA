<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
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

        //return "Listo para grabar";
        //$datos= request()->all();
        //return response()->json($datos);
        $request->validate([
            'fecha_reserva'=>'required|date',
            'hora_reserva'=>'required|date_format:H:i',
           

        ]);


        $doctor= Doctor::find($request->doctor_id);
        $fecha_reserva = $request->fecha_reserva;
        $hora_reserva = $request->hora_reserva;
        // Obtener el día de la semana (1 para lunes, 2 para martes, etc.)
        $dia = date('N',strtotime($fecha_reserva));
        $dia_de_reserva = $this->traducir_dia($dia);
        //Validar horarios de doctores
     
        $horarios = Horario::where('doctor_id',$doctor->id)
         
                        ->where('dia', $dia_de_reserva)
                        ->where('hora_inicio','<=',$hora_reserva)
                        ->where('hora_final','>=', $hora_reserva)
                        ->exists();
                        if(!$horarios) {
                            throw ValidationException::withMessages([
                                'hora_reserva' => ['Doctor no disponible en este horario.'],
                            ]);
                        }

         
        //Validar citas duplicadas
        $eventos_duplicados = Event::where('doctor_id',$doctor->id)
                                ->where('start',$fecha_reserva." ".$hora_reserva)
                                ->exists();
                                if($eventos_duplicados) {
                                    return redirect()->back()->withErrors([
                                        'hora_reserva' =>'Doctor ya esta reservado a esa hora',
                                    ]);
                                }
        $evento = new Event();
        $evento->title = $request->hora_reserva." ".$doctor->especialidad;
        $evento->start = $request->fecha_reserva. " ".$hora_reserva;
        $evento->end = $request->fecha_reserva. " ".$hora_reserva;
        $evento->color = 'red';
        $evento->user_id = Auth::user()->id;
        $evento->doctor_id = $request->doctor_id;
        $evento->consultorio_id ='1';
        $evento->save();
        //return to form
        return redirect()->route('home.index')
            ->with('message','Se registro la reserva médica correctamente');

    }

    private function traducir_dia($dia_semana)
    {
        $dias = [
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miércoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'Sábado',
            7 => 'Domingo'
        ]; 

        return $dias[$dia_semana] ?? null;
    }

    public function getReservasPorDoctor($doctorId)
{
    // Validar que el doctor existe
    $doctor = Doctor::find($doctorId);
    if (!$doctor) {
        return response()->json(['error' => 'Doctor no encontrado'], 404);
    }

    // Obtener eventos de reservas del doctor
    $reservas = Event::where('doctor_id', $doctorId)
        ->with('paciente') // Relación con el paciente
        ->get();

    // Formatear datos para FullCalendar
    $eventos = $reservas->map(function ($reserva) {
        return [
            'title' => $reserva->paciente->name ?? 'Paciente desconocido',
            'start' => $reserva->start,
            'end' => $reserva->end,
            'descripcion' => $reserva->descripcion ?? 'Sin descripción',
            'color' => $reserva->color ?? '#007bff', // Azul por defecto
        ];
    });

    return response()->json($eventos);
}

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        Event::destroy($id);
        return redirect()->back()->with('message', 'Cita eliminada con éxito.');
    }
}
