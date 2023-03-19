<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'email' => "seguridadweb@campusviu.es",
            'password' => "S3gur1d4d?W3b",
            'nombre' => "Prueba",
            'apellidos' => "Apellidos Test",
            'dni' => '11111112L',
            'telefono' => '+123456789',
            'pais' => 'España',
            'iban' => 'ES91 2100 0418 45 0200051332',
            'informacion' => 'Este usuario ha sido alimentado por un seeder para la prueba final'
        ]);
    }
}
