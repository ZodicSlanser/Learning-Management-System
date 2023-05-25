<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'academic_number',
        'role',
        'department_id',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected static function newFactory()
    {
        return UserFactory::new();
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

    public function courses()
    {
        if ($this->role === Role::PROFESSOR) {
            return $this->hasMany(Course::class, 'professor_id');
        } elseif ($this->role === Role::STUDENT) {
            return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id');
        }
        return null;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function is_admin()
    {
        return $this->role === Role::ADMIN;
    }

    public function has_enrolled_in(Course $course)
    {
        return $this->courses_enrolled()->where('id', $course->id)->exists();
    }

    public static function get_eligable_courses($studentId){
        $student = User::find($studentId);
            $enrolledCourses = $student->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id')->pluck('id');
            $prerequisiteCourses = Course::whereIn('prerequisite_id', $enrolledCourses)->pluck('id');
            return Course::whereNotIn('id', $enrolledCourses)->whereIn('id', $prerequisiteCourses)->get();
    }

    public function courses_enrolled()
    {
        if ($this->is_student()) {
            return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id');
        }
        return collect();
    }


    public function is_student()
    {
        return $this->role === Role::STUDENT;
    }

    public function has_taught(Course $course)
    {
        return $this->courses_taught()->where('id', $course->id)->exists();
    }

    public function courses_taught()
    {
        if ($this->is_professor())
            return $this->courses;
        return null;
    }

    public function is_professor()
    {
        return $this->role === Role::PROFESSOR;
    }

    public function is_in_department(Department $department)
    {
        return $this->department->id === $department->id;
    }

    public function departments()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }


}
