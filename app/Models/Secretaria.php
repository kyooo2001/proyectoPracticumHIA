<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Secretaria extends Model
{
    use HasFactory, HasRoles;
    //relacion 1 user table a 1 secretaria
    protected $guarded = []; // Todos los campos son asignables

    public function user()
    {

        //relacion con 1 usuario a 1 Secretarias

        return $this->belongsTo(User::class);
    }
}
