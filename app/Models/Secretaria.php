<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;
//relacion 1 1 secretaria con user table

public function user(){

    //relacion con 11 con Secretarias
    return $this->belongsTo(User::class);
}

}
