<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pro';
    protected $fillable = ['id_usu', 'tipo', 'titulo', 'descripcion', 'dias', 'hr_inicio', 'hr_fin', 'estado', 'formato', 'portada'];

}
