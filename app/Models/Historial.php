<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    //Relacion 1 paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    //Relacion 1 doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
