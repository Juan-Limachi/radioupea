<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'ci' => '12345678',
            'nombre' => 's',
            'paterno' => 'i',
            'materno' => 'e',
            'name' => 'sie',
            'email' => 'sie@gmail.com',
            'estado' => 'ACTIVO',
            'password' => bcrypt('sie#123456'),
            'id_rol' => '1',
        ]);

        DB::table('users')->insert([
            'ci' => '10082285',
            'nombre' => 'juan pablo',
            'paterno' => 'limachi',
            'materno' => 'coronel',
            'name' => 'juanli',
            'email' => 'juan@gmail.com',
            'estado' => 'ACTIVO',
            'password' => bcrypt('sie#123456'),
            'id_rol' => '2',
        ]);
    }
}
