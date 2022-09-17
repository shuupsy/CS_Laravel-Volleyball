<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Joueur>
 */
class JoueurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom_joueur' => $this->faker->lastName,
                'prenom_joueur' => $this->faker->firstName,
                'age' => $this->faker->numberBetween($min=5, $max=90),
                'telephone' => $this->faker->phoneNumber,
                'mail' => $this->faker->email,
                'genre' => $this->faker->randomElement($genre = array('F','H', null)),
                'pays_origine' => $this->faker->country,
                'role_id' => $this->faker->numberBetween($min=1, $max=4),
                'equipe_id' => $this->faker->randomElement($equipe = array('1','2','3', '4', '5', null)),
        ];
    }
}
