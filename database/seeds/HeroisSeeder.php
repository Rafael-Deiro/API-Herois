<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('herois')->insert([
            [
                'nome' => 'Batman',
                'nome_real' => 'Bruce Wayne',
                'origem' => 'quadrinhos',
                'poder_principal' => 'medo',
                'poder_secundario' => 'robin'
            ],
            [
                'nome' => 'Homem de Ferro',
                'nome_real' => 'Tony Stark',
                'origem' => 'quadrinhos',
                'poder_principal' => 'inteligência',
                'poder_secundario' => 'voar'
            ],
            [
                'nome' => 'Hulk',
                'nome_real' => 'Bruce Banner',
                'origem' => 'quadrinhos',
                'poder_principal' => 'forca',
                'poder_secundario' => 'parede celular'
            ],
            [
                'nome' => 'Thor',
                'nome_real' => 'Thor Odinson',
                'origem' => 'mitologia',
                'poder_principal' => 'trovao',
                'poder_secundario' => 'Mjolnir'
            ],
            [
                'nome' => 'Homem Aranha',
                'nome_real' => 'Peter Parker',
                'origem' => 'quadrinhos',
                'poder_principal' => 'teia',
                'poder_secundario' => 'sentido aranha'
            ],
            [
                'nome' => 'Super Homem',
                'nome_real' => 'Klark Kent',
                'origem' => 'quadrinhos',
                'poder_principal' => 'voar',
                'poder_secundario' => 'forca'
            ],
        ]);
    }
}
