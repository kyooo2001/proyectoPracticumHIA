<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    //Solo registrar campos
    protected $fillable=['nombre', 'apellidos','celular','licencia_medica','especialidad','user_id'];

    //Relacion 1 Doctor 1 Consultorio

    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }

    //Relacion 1 Doctor N* muchos horarios

    public function horarios(){
        return $this->hasMany(Horario::class);
    }
}
