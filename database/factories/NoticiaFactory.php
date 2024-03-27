<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Noticia>
 */
class NoticiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tipo' => $this->faker->randomElement(['INSTITUCIONAL', 'SEGURIDAD', 'POLÍTICA', 'SOCIALES', 'EL ALTO', 'NACIONAL', 'INTERNACIONAL', 'ECONOMÍA', 'DEPORTES']),
            'titulo' => $this->faker->sentence(),
            'nota' => $this->faker->text(),
            'fecha' => $this->faker->dateTimeThisMonth(),
            'formato' => $this->faker->randomElement(['IMAGEN', 'VIDEO']),
            'id_usu' => User::inRandomOrder()->first(),
        ];
    }
}
