<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_int';
    protected $fillable = ['ci', 'complemento', 'nombre', 'paterno', 'materno', 'id_car', 'name', 'estado', 'imagen'];
}
