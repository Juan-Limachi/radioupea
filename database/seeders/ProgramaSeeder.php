<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programas')->insert([
            'portada' => 'revistaaymara.png',
            'formato' => 'IMAGEN',
            'titulo' => 'REVISTA AYMARA',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '05:00:00',
            'hr_fin' => '06:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => '100%noticiasaymara.jfif',
            'formato' => 'IMAGEN',
            'titulo' => '100% NOTICIAS AYMARA',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '07:00:00',
            'hr_fin' => '08:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'radionovelakaliman.png',
            'formato' => 'IMAGEN',
            'titulo' => 'RADIONOVELA KALIMAN',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '08:00:00',
            'hr_fin' => '08:30:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'elclubdelalectura.jpg',
            'formato' => 'IMAGEN',
            'titulo' => 'EL CLUB DE LA LECTURA',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '08:30:00',
            'hr_fin' => '09:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'revistamatinal.png',
            'formato' => 'IMAGEN',
            'titulo' => 'REVISTA MATINAL',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '09:00:00',
            'hr_fin' => '10:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'puntodeencuentro.png',
            'formato' => 'IMAGEN',
            'titulo' => 'PUNTO DE ENCUENTRO',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '10:00:00',
            'hr_fin' => '12:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'cabinafutbol.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'UPEA SPORTS CABINA FUTBOL',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '12:00:00',
            'hr_fin' => '13:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => '100%noticiasmeridiano.jfif',
            'formato' => 'IMAGEN',
            'titulo' => '100% NOTICIAS MERIDIANO',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '13:00:00',
            'hr_fin' => '14:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'amigosimaginarios.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'AMIGOS IMAGINARIOS',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '14:00:00',
            'hr_fin' => '15:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'infantilshow.png',
            'formato' => 'IMAGEN',
            'titulo' => 'INFANTIL SHOW',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '15:00:00',
            'hr_fin' => '16:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'musicandlove.png',
            'formato' => 'IMAGEN',
            'titulo' => 'MUSIC AND LOVE',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '16:00:00',
            'hr_fin' => '17:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'unbrakeuniversitario.png',
            'formato' => 'IMAGEN',
            'titulo' => 'BRAKE UNIVERSITARIO',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '17:00:00',
            'hr_fin' => '18:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => '100%noticiascentral.jfif',
            'formato' => 'IMAGEN',
            'titulo' => '100% NOTICIAS CENTRAL',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '18:00:00',
            'hr_fin' => '19:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'dosisdiaria.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'DOSIS DIARIA',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '19:00:00',
            'hr_fin' => '20:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'EL PUEBLO LO SABE',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '20:00:00',
            'hr_fin' => '21:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'NOCHES DE ROMANCE',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '21:00:00',
            'hr_fin' => '22:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'REPRIS RADIONOVELAS',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '22:00:00',
            'hr_fin' => '22:30:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'REPRIS EL CLUB DE LA LECTURA',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES',
            'hr_inicio' => '22:30:00',
            'hr_fin' => '23:00:00',
            'id_usu' => '1',
        ]);



        DB::table('programas')->insert([
            'portada' => 'conecta2.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'CONECTADOS',
            'dias' => 'SABADO',
            'hr_inicio' => '07:00:00',
            'hr_fin' => '09:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'simplementesoberanas.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'SIMPLEMENTE SOBERANAS',
            'dias' => 'SABADO',
            'hr_inicio' => '09:00:00',
            'hr_fin' => '10:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'apocriforock.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'APOCRIFO ROCK',
            'dias' => 'SABADO',
            'hr_inicio' => '10:00:00',
            'hr_fin' => '11:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'HORA SALUD',
            'dias' => 'SABADO',
            'hr_inicio' => '11:00:00',
            'hr_fin' => '12:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'atodovolumen.png',
            'formato' => 'IMAGEN',
            'titulo' => 'A TODO VOLUMEN',
            'dias' => 'SABADO',
            'hr_inicio' => '12:00:00',
            'hr_fin' => '14:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'radioshok.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'RADIOSHOK DISBEDC',
            'dias' => 'SABADO',
            'hr_inicio' => '14:00:00',
            'hr_fin' => '16:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'BRECHA EDUCATIVA',
            'dias' => 'SABADO',
            'hr_inicio' => '16:00:00',
            'hr_fin' => '17:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'tardejuvenil.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'TARDE JUVENIL',
            'dias' => 'SABADO',
            'hr_inicio' => '17:00:00',
            'hr_fin' => '19:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'ESPACIO JUVENIL',
            'dias' => 'SABADO',
            'hr_inicio' => '19:00:00',
            'hr_fin' => '21:00:00',
            'id_usu' => '1',
        ]);



        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'JIWASPACHATA',
            'dias' => 'DOMINGO',
            'hr_inicio' => '08:00:00',
            'hr_fin' => '10:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'SEGUIMOS RECORDANDO',
            'dias' => 'DOMINGO',
            'hr_inicio' => '10:00:00',
            'hr_fin' => '12:00:00',
            'id_usu' => '1',
        ]);
        
        DB::table('programas')->insert([
            'portada' => 'desdeelalmadebolivia.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'DESDE EL ALMA DE BOLIVIA',
            'dias' => 'DOMINGO',
            'hr_inicio' => '12:00:00',
            'hr_fin' => '14:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'todoonada.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'TODO O NADA',
            'dias' => 'DOMINGO',
            'hr_inicio' => '14:00:00',
            'hr_fin' => '16:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'ensintoniaconla100.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'EN SINTONÍA CON LA 100',
            'dias' => 'DOMINGO',
            'hr_inicio' => '16:00:00',
            'hr_fin' => '18:00:00',
            'id_usu' => '1',
        ]);

        DB::table('programas')->insert([
            'portada' => 'invernaliaculturas.jfif',
            'formato' => 'IMAGEN',
            'titulo' => 'INVERNALIA CULTURAS',
            'dias' => 'DOMINGO',
            'hr_inicio' => '18:00:00',
            'hr_fin' => '20:00:00',
            'id_usu' => '1',
        ]);


        
        DB::table('programas')->insert([
            'portada' => 'noImage.png',
            'formato' => 'IMAGEN',
            'titulo' => 'ESPACIO MUSICAL',
            'dias' => 'LUNES - MARTES - MIERCOLES - JUEVES - VIERNES - SABADO - DOMINGO',
            'id_usu' => '1',
        ]);
    }
}
