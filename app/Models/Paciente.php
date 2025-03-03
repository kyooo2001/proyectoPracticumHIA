<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Paciente extends Model
{
    use HasFactory, HasRoles;
    protected $guarded = []; // Todos los campos son asignables

    //Relacion historial
    public function historial()
    {
        return $this->hasMany(Historial::class);
    }
    //Relacion factura
    public function factura()
    {
        return $this->hasMany(Factura::class);
    }


}
