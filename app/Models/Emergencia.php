<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emergencia
 *
 * @property $id
 * @property $paciente_id
 * @property $frecuencia_cardiaca_alta
 * @property $frecuencia_cardiaca_baja
 * @property $frecuencia_respiratoria
 * @property $presion_arterial
 * @property $saturacion_oxigeno
 * @property $nivel_conciencia
 * @property $categoria
 * @property $puntaje_total
 * @property $created_at
 * @property $updated_at
 *
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Emergencia extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['paciente_id', 'frecuencia_cardiaca_alta', 'frecuencia_cardiaca_baja', 'frecuencia_respiratoria', 'presion_arterial', 'saturacion_oxigeno', 'nivel_conciencia', 'categoria', 'puntaje_total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class, 'paciente_id', 'id');
    }
    

}
