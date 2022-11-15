<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //introducimos los campos que queremos con su tip
        //los "faker" ya vienen dentro de los facotry
        //no hay que instanciarlos
        //
        return [
            //texto aleatorio de 30 caracteres
            "title" => $this->faker->text(30),
            //texto aleatorio para el "content"
            "content" => $this->faker->text,
            //obtenemos todos los usuarios que tenemos y asignamos
            //uno aleatoriamente
            "user_id" => User::all()->random(1)->first()->id,
            //idem con las categorías
            "category_id" => Category::all()->random(1)->first()->id,
            //hora de creación ahora con la función, de Carbon, now()
            "created_at" => now(),
        ];
    }
}
