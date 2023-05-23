<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Department;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 departments
        $departments = Department::factory()->count(5)->create();

        $admins = User::factory()
            ->admin()
            ->count(5)
            ->create();

        $professors = User::factory()
            ->professor()
            ->count(10)
            ->state(function (array $attributes) use ($departments) {
                return ['department_id' => $departments->random()->id];
            })
            ->create();

        $students = User::factory()
            ->student()
            ->count(100)
            ->create();

        User::factory()->create([
            'name' => 'Test',
            'username' => 'test',
            'email' => 'test@test.example',
            'password' => Hash::make('test'),
            'academic_number' =>50,
            'department_id' => 5,
            'role' => '3',
        ]);
        $courses = Course::factory()
            ->count(100)
            ->state(function (array $attributes) use ($departments, $professors) {
                return [
                    'department_id' => $departments->random()->id,
                    'professor_id' => $professors->random()->id,
                ];
            })->create();

            Enrollment::factory()->create([
                'student_id' => 116,
                'course_id' => 27 ,
                'grade' => 80,
            ]);
        // Enroll students in random courses
        foreach ($students as $student) {
            $enrollments = Enrollment::factory()
                ->count(rand(2, 5))
                ->state(function (array $attributes) use ($courses, $student) {
                    $course = $courses->random();
                    return [
                        'course_id' => $course->id,
                        'grade' => rand(50, 100),
                        'student_id' => $student->id,
                    ];
                })->create();

        }
    }
}
