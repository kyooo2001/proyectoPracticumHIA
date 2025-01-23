<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Horario extends Model
{
    use HasFactory, HasRoles;

    //Solo registrar campos
    protected $fillable=['dia', 'hora_inicio','hora_final','doctor_id','consultorio_id'];

    //Relacion N* Horario N* muchos doctores

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    //Relacion 1 Horario N* muchos doctor

    public function consultorio()
    {
        return $this->belongsTo(consultorio::class);
    }
}
