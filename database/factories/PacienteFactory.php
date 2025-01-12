<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Fake pacientes

            
                'nombres'=>$this->faker->name,
                'apellidos'=>$this->faker->lastName,
                'ci'=>$this->faker->unique()->numerify('##########'),
                'celular'=>$this->faker->phoneNumber,
                'correo'=>$this->faker->unique()->safeEmail,
                'seguro_medico'=>$this->faker->sentence($nbWords = 6, $variableNbWords = true),
                'fecha_nacimiento'=>$this->faker->date('Y-m-d', '2025-01-01'),
                'genero'=>$this->faker->randomElement(['M','F']),
                'grupo_sanguineo'=>$this->faker->randomElement(['A+','A-','B+','B-','AB+','AB-','O+','O-']),
                'alergias'=>$this->faker->sentence,
                'ciudad'=>$this->faker->city,
                'provincia'=>$this->faker->state,
                'direccion'=>$this->faker->address,
                'contacto_emergencia'=>$this->faker->phoneNumber,
                'observaciones'=>$this->faker->word,
        ];
    }
}
