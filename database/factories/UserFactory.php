<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $departments = Department::pluck('id')->toArray();
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt($this->faker->password),
            'department_id' => $this->faker->randomElement($departments),
            'academic_number' => $this->faker->unique()->randomNumber(),
            'role' => Role::STUDENT, // Default to student role.
        ];
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'department_id' => null,
                'academic_number' => null,
                'role' => Role::ADMIN,
            ];
        });
    }

    public function professor()
    {
        return $this->state(function (array $attributes) {
            return [
                'academic_number' => null,
                'role' => Role::PROFESSOR,
            ];
        });
    }

    public function student()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => Role::STUDENT,
            ];
        });
    }
}
