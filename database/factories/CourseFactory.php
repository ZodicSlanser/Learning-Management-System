<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        $name = $this->faker->sentence(3);
        $code = $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}');

        return [
            'name' => $name,
            'code' => $code,
            'department_id' => Department::factory()->create()->id,
            'professor_id' => User::factory()->create(['role' => 'professor'])->id,
            'prerequisite_id' => null,
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Course $course) {
            $prerequisites = Course::where('id', '<>', $course->id)->pluck('id')->toArray();
            $course->prerequisite_id = $this->faker->randomElement(array_merge([null], $prerequisites));
        });
    }
}
