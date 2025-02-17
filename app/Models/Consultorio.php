<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Consultorio extends Model
{
    use HasFactory, HasRoles;
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

    public function events(){

        //relacion con 1 consultorio has n* events
        return $this->hasMany(Event::class);
    }

}
