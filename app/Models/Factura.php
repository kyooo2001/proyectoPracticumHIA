<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    
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
