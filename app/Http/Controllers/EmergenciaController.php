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
        Emergencia::create($request->validated());


        return redirect()->route('emergencias.index')
            ->with('success', 'Emergencia created successfully.');
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

        return view('emergencia.edit', compact('emergencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmergenciaRequest $request, Emergencia $emergencia)
    {
        $emergencia->update($request->validated());

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
