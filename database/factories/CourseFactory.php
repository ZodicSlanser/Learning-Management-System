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
        $name = $this->faker->name();
        $code = $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}');

        $departmentIds = Department::pluck('id')->toArray();
        $professorIds = User::where('role', '2')->pluck('id')->toArray();

        return [
            'name' => $name,
            'code' => $code,
            'department_id' => $this->faker->randomElement($departmentIds),
            'professor_id' => $this->faker->randomElement($professorIds),
            'prerequisite_id' => null,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Course $course) {
            $prerequisites = Course::where('id', '<>', $course->id)->pluck('id')->toArray();
            $course->prerequisite_id = $this->faker->randomElement(array_merge([null], $prerequisites));
            $course->save();
        });
    }
}
