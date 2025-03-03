<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Secretaria extends Model
{
    use HasFactory, HasRoles;
//relacion 1 1 secretaria con user table
protected $guarded = []; // Todos los campos son asignables

public function user(){

    //relacion con 11 con Secretarias
    
    return $this->belongsTo(User::class);
}

}
