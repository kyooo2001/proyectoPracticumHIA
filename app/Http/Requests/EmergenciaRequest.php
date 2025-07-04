<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmergenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'paciente_id' => 'required',
			'frecuencia_cardiaca_alta' => 'required',
			'frecuencia_cardiaca_baja' => 'required',
			'frecuencia_respiratoria' => 'required',
			'presion_arterial' => 'required',
			'saturacion_oxigeno' => 'required',
			'nivel_conciencia' => 'required',
			'categoria' => 'required',
			'puntaje_total' => 'required',
        ];
    }
}
