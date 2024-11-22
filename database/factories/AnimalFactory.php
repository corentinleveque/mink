<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class AnimalFactory extends Factory
{

    protected $model = Animal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'age' => $this->faker->randomNumber(3),
            'type' => $this->faker->randomElement(
                    [             
                        'chien',
                        'cheval',
                        'brebis',
                        'cochon'
                    ]),
            'race' => $this->faker->randomElement(
                    [ 
                        'labrador',
                        'frison',
                        'pottok',
                        'irish cob',
                        'merinos',
                        'solognotes'
                    ]),
            'description' => $this->faker->text(),
            'isSaled' =>  $this->faker->randomElement([0,1]),
            'prixHt' => $this->faker->randomNumber(3),
            'image1' => null,
            'image2' => null
        ];
    }
}
