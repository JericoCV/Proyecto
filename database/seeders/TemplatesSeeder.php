<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        DB::table('templates')->insert([
            [
                'name' => 'Comunicados',
                'description' => 'Secciones de texto y menús con enlaces',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Noticias',
                'description' => 'Secciones de texto e imágenes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Galerías',
                'description' => 'Secciones de imágenes',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
