<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    //Solo registrar campos
    protected $fillable=['nombres', 'apellidos','celular','licencia_medica','especialidad','user_id'];

    //Relacion 1 Doctor 1 Consultorio

    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }

    //Relacion 1 Doctor N* muchos horarios

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    public function user(){

        //relacion con 1a1 con user
        return $this->belongsTo(User::class);
    }

}
