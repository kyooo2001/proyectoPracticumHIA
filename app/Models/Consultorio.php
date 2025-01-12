<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;
    //Solo registrar campos
    protected $fillable=['nombre', 'especialidad','estado','telefono','capacidad'];

    //Relacion 1 Consultorio N* muchos doctores

    public function doctores(){
        return $this->hasMany(Doctor::class);
    }

    //Relacion 1 Consultorio N* muchos horarios

    public function horarios(){
        return $this->hasMany(Horario::class);
    }
}
