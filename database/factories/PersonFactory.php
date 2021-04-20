<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
	    'firstname' => $this->faker->firstName,
	    'lastname' => $this->faker->lastName,
	    'place' => $this->faker->numberBetween(1,50),
	    'birth_date' => $this->faker->date,
	    'birth_place' => $this->faker->city,
        ];
    }
}
