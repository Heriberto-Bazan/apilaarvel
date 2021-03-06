<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $filable = [ 'nombre', 'apellido', 'correo', 'telefono', 'company_id' ];
}
