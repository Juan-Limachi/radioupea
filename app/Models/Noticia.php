<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_not';
    protected $fillable = ['id_usu', 'tipo', 'titulo', 'nota', 'fecha', 'estado', 'formato', 'portada'];
}
