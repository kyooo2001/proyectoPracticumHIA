<?php

namespace App\Http\Controllers;

use App\Models\Emergencia;
use App\Models\Paciente;
use App\Http\Requests\EmergenciaRequest;


/**
 * Class EmergenciaController
 * @package App\Http\Controllers
 */
class EmergenciaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emergencias = Emergencia::paginate();

        return view('emergencia.index', compact('emergencias'))
            ->with('i', (request()->input('page', 1) - 1) * $emergencias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $emergencia = new Emergencia();
        return view('emergencia.create', compact('emergencia', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmergenciaRequest $request)
    {
        //Emergencia::create($request->validated());
        $valor = $request->validated();

        // Cálculo de puntajes individuales
        $pfc = $this->puntajeFrecuenciaCardiaca($valor['frecuencia_cardiaca_alta'], $valor['frecuencia_cardiaca_baja']);
        $pfr = $this->puntajeFrecuenciaRespiratoria($valor['frecuencia_respiratoria']);
        $ppa = $this->puntajePresionArterial($valor['presion_arterial']);
        $pspo2 = $this->puntajeSaturacionOxigeno($valor['saturacion_oxigeno']);
        $pconciencia = $this->puntajeConciencia($valor['nivel_conciencia']);

        // Suma total y categoría
        $valor['puntaje_total'] = $pfc + $pfr + $ppa + $pspo2 + $pconciencia;
        $valor['categoria'] = $this->clasificacionCategoria($valor['puntaje_total']);

        Emergencia::create($valor);


        return redirect()->route('emergencias.index')
            ->with('success', 'Emergencia created successfully.');
    }
    /**
     * Calcula el puntaje según la frecuencia cardíaca (promedio entre alta y baja).
     */
    private function puntajeFrecuenciaCardiaca($alta, $baja)
    {
        $promedio = ($alta + $baja) / 2;

        // Alerta moderada
        if ($promedio >= 100 && $promedio <= 120) return 1;

        // Alerta severa
        if (($promedio >= 121 && $promedio <= 140) || ($promedio >= 40 && $promedio <= 49)) return 3;

        // Crítico
        if ($promedio > 140 || $promedio < 40) return 5;

        // Normal
        return 0;
    }

    /**
     * Calcula el puntaje según la frecuencia respiratoria.
     */
    private function puntajeFrecuenciaRespiratoria($valor)
    {
        // Alerta moderada
        if ($valor >= 21 && $valor <= 24) return 1;

        // Alerta severa
        if (($valor >= 25 && $valor <= 30) || ($valor >= 6 && $valor <= 8)) return 3;

        // Crítico
        if ($valor > 30 || $valor < 6) return 5;

        // Normal
        return 0;
    }

    /**
     * Calcula el puntaje según la presión arterial sistólica.
     */
    private function puntajePresionArterial($valor)
    {
        // Alerta moderada
        if ($valor >= 140 && $valor <= 160) return 1;

        // Alerta severa
        if (($valor >= 161 && $valor <= 180) || ($valor >= 70 && $valor <= 79)) return 3;

        // Crítico
        if ($valor > 180 || $valor < 70) return 5;

        // Normal
        return 0;
    }

    /**
     * Calcula el puntaje según la saturación de oxígeno (SpO2).
     */
    private function puntajeSaturacionOxigeno($valor)
    {
        // Alerta moderada
        if ($valor >= 90 && $valor <= 94) return 1;

        // Alerta severa
        if ($valor >= 85 && $valor <= 89) return 3;

        // Crítico
        if ($valor < 85) return 5;

        // Normal
        return 0;
    }

    /**
     * Calcula el puntaje según el nivel de conciencia (AVPU).
     */
    private function puntajeConciencia($valor)
    {
        // Devuelve el puntaje de acuerdo al valor seleccionado por el usuario
        return match ($valor) {
            'Alerta' => 0,
            'Responde a voz' => 1,
            'Responde al dolor' => 3,
            'No responde' => 5,
            default => 0,
        };
    }

    /**
     * Determina la categoría final del triaje según el puntaje total acumulado.
     */
    private function clasificacionCategoria($total)
    {
        return match (true) {
            $total <= 4 => 'Verde',     // No urgente
            $total <= 9 => 'Amarillo',  // Urgente
            $total <= 14 => 'Naranja',  // Muy urgente
            default => 'Rojo',          // Emergencia
        };
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $emergencia = Emergencia::find($id);

        return view('emergencia.show', compact('emergencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $emergencia = Emergencia::find($id);
        $pacientes = Paciente::all();

        return view('emergencia.edit', compact('emergencia', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmergenciaRequest $request, Emergencia $emergencia)
    {
        //$emergencia->update($request->validated());
        $valor = $request->validated();

        // Cálculo de puntajes individuales
        $pfc = $this->puntajeFrecuenciaCardiaca($valor['frecuencia_cardiaca_alta'], $valor['frecuencia_cardiaca_baja']);
        $pfr = $this->puntajeFrecuenciaRespiratoria($valor['frecuencia_respiratoria']);
        $ppa = $this->puntajePresionArterial($valor['presion_arterial']);
        $pspo2 = $this->puntajeSaturacionOxigeno($valor['saturacion_oxigeno']);
        $pconciencia = $this->puntajeConciencia($valor['nivel_conciencia']);

        // Puntaje total y categoría
        $valor['puntaje_total'] = $pfc + $pfr + $ppa + $pspo2 + $pconciencia;
        $valor['categoria'] = $this->clasificacionCategoria($valor['puntaje_total']);

        // Actualiza la emergencia con datos calculados
        $emergencia->update($valor);


        return redirect()->route('emergencias.index')
            ->with('success', 'Emergencia updated successfully');
    }

    public function destroy($id)
    {
        Emergencia::find($id)->delete();

        return redirect()->route('emergencias.index')
            ->with('success', 'Emergencia deleted successfully');
    }
}
