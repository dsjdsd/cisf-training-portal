<?php

namespace Database\Factories;

use App\Models\TrainingProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingProgramFactory extends Factory
{
    protected $model = TrainingProgram::class;

    public function definition()
    {
        return [
            'programme_name' => $this->faker->word,
            'course_director_name' => $this->faker->name,
            'from_date' => $this->faker->date(),
            'to_date' => $this->faker->date(),
            'from_time' => $this->faker->time(),
            'to_time' => $this->faker->time(),
            'course_fee' => $this->faker->randomFloat(2, 100, 1000),
            'eligibility' => $this->faker->sentence,
            'core_contents' => $this->faker->paragraph,
            'brochure' => null, // or a default value if needed
        ];
    }
}
