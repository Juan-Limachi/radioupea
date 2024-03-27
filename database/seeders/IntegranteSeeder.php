<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IntegranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('integrantes')->insert([
            'imagen' => 'marcoantoniomorenoramirez.jfif',
            'ci' => '',
            'nombre' => 'Dr. Marco Antonio',
            'paterno' => 'Moreno',
            'materno' => 'Ramirez Ph. D.',
            'cargo' => 'Jefe de Radio UPEA',
            'estado' => 'ACTIVO'
        ]);
        
        DB::table('integrantes')->insert([
            'imagen' => 'rogerfranzdelgadoperez.jfif',
            'ci' => '',
            'nombre' => 'Lic. Roger Franz',
            'paterno' => 'Delgado',
            'materno' => 'Pérez',
            'cargo' => 'Encargado de Contenidos y Programas',
            'estado' => 'ACTIVO'
        ]);

        DB::table('integrantes')->insert([
            'imagen' => 'zindyaoliviahuata.jfif',
            'ci' => '',
            'nombre' => 'Lic. Zindya',
            'paterno' => 'Olivia',
            'materno' => 'Huata',
            'cargo' => 'Encargada de Prensa',
            'estado' => 'ACTIVO'
        ]);

        DB::table('integrantes')->insert([
            'imagen' => 'raquelbalanza.jfif',
            'ci' => '',
            'nombre' => 'Lic. Raquel',
            'paterno' => 'Balanza',
            'cargo' => 'Auxiliar de Oficina',
            'estado' => 'ACTIVO'
        ]);

        DB::table('integrantes')->insert([
            'imagen' => 'josealvarogutierrezramirez.jfif',
            'ci' => '',
            'nombre' => 'Jose Álvaro',
            'paterno' => 'Gutiérrez',
            'materno' => 'Ramirez',
            'cargo' => 'Técnico Operador',
            'estado' => 'ACTIVO'
        ]);

        DB::table('integrantes')->insert([
            'imagen' => 'juancruztintayatola.jfif',
            'ci' => '',
            'nombre' => 'Juan Cruz',
            'paterno' => 'Tintaya',
            'materno' => 'Tola',
            'cargo' => 'Técnico de Radio',
            'estado' => 'ACTIVO'
        ]);

        DB::table('integrantes')->insert([
            'imagen' => 'beymarruddyquispevelasco.png',
            'ci' => '',
            'nombre' => 'Beymar Ruddy',
            'paterno' => 'Quispe',
            'materno' => 'Velascos',
            'cargo' => 'Productor',
            'estado' => 'ACTIVO'
        ]);
    }
}
