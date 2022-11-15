<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // nuestros añadidos
        //Utilizamos nuestro modelo Category, y de este modelo
        //podemos usar varias funciones, insert para meter muchos datos
        //o create para un único dato. Vamos a utilizar insert, puesto
        // que vamos a introducir varios. Creamos un array por cada dato.
        Category::insert([
            ["name" => "Php",],
            ["name" => "Laravel",],
            ["name" => "Vue",],
            ["name" => "Docker",],
        ]);
    }
}
