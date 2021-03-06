<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\Level;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'levelId' => Level::all()->random()->id,
            'subjectId' => Subject::all()->random()->id,
            'weekNo' => $this->faker->numberBetween(1,6),
            'teacherId' => User::all()->random()->id,
        ];
    }
}
