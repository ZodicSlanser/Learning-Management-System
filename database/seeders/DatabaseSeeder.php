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

        $defAdmin = User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.example',
            'password' => Hash::make('admin'),
            'role' => '1',
        ]);
        $defProfessor = User::factory()->create([
            'name' => 'Professor',
            'username' => 'prof',
            'email' => 'prof@prof.example',
            'department_id' => $departments->random()->id,
            'password' => Hash::make('prof'),
            'role' => '2',
        ]);
        $defStudent = User::factory()->create([
            'name' => 'Student',
            'username' => 'stud',
            'email' => 'stud@stud.example',
            'password' => Hash::make('stud'),
            'role' => '3',
        ]);

        $admins = User::factory()
            ->admin()
            ->count(5)
            ->create();
        $admins->push($defAdmin);
        $professors = User::factory()
            ->professor()
            ->count(10)
            ->state(function (array $attributes) use ($departments) {
                return ['department_id' => $departments->random()->id];
            })
            ->create();
        $professors->push($defProfessor);
        $students = User::factory()
            ->student()
            ->count(100)
            ->create();
        $students->push($defStudent);

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
            'course_id' => 27,
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
