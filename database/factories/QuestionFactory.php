<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'quizId' => Quiz::pluck('id')->random(),
            'statement' => $this->faker->sentence,
            'optionA' => $this->faker->word,
            'optionB' => $this->faker->word,
            'optionC' => $this->faker->word,
            'optionD' => $this->faker->word,
            'ans' => $this->faker->randomElement(['A','B','C','D']),
            
        ];
    }
}
