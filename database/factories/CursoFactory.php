<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Docente; 

class CursoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'docente_id' => Docente::factory(),
            'nombre' => fake()->unique()->randomElement([
                'Ingeniería Web', 'Base de Datos', 'Redes', 'Algoritmos',
                'Sistemas Operativos', 'Ingeniería de Software',
                'Seguridad Informática', 'Inteligencia Artificial',
            ]),
            'descripcion' => fake()->sentence(12),
            'creditos' => fake()->numberBetween(2, 5),
        ];
    }
}