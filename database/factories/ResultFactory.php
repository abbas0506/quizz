<?php

namespace Database\Factories;

use App\Models\Result;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Result::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'quizId' => Quiz::all()->random()->id,
            'rollNo' => $this->faker->numberBetween(1,70),
            'sname' => $this->faker->name,
            'marks' => $this->faker->numberBetween(1,20),
            'total' => 20,
        ];
    }
}
