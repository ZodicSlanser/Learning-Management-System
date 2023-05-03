<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'student_id' => User::factory(),
            'course_id' => Course::factory(),
            'grade' => $this->faker->numberBetween(0, 100),
        ];
    }
}
