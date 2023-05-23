<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'prerequisite_id',
        'department_id',
        'professor_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:courses,code',
        'department_id' => 'required|exists:departments,id',
        'prerequisite_id' => 'nullable|exists:courses,id',
        'professor_id' => 'nullable|exists:users,id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function getPrerequisite()
    {
        return $this->prerequisite()->first();
    }

    public function prerequisite()
    {
        return $this->belongsTo(Course::class);
    }

    public function getEnrollments()
    {
        return $this->enrollments()->with('student')->get();
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function enroll(User $student): bool
    {
        $enrollment = new Enrollment([
            'student_id' => $student->id,
            'course_id' => $this->id,
        ]);

        return $enrollment->save();
    }

    public function save(array $options = [])
    {
        self::validate($this->attributes);
        return parent::save($options);
    }

    public static function validate(array $data)
    {
        return Validator::make($data, self::$rules);
    }

    public function is_enrolled(User $student): bool
    {
        return $this->students()->contains($student);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments')
            ->using(Enrollment::class)
            ->withPivot('grade');
    }

    public function drop(User $student): bool
    {
        $enrollment = Enrollment::where('student_id', $student->id)
            ->where('course_id', $this->id)
            ->first();

        if (!$enrollment) {
            return false; // student is not enrolled in the course
        }

        $enrollment->delete();
        return true;
    }

    public function update_grade(User $student, int $new_grade): bool
    {
        $enrollment = Enrollment::where('student_id', $student->id)
            ->where('course_id', $this->id)
            ->first();

        if (!$enrollment) {
            return false; // student is not enrolled in the course
        }

        $enrollment->grade = $new_grade;
        $enrollment->save();
        return true;
    }
    public static function getCoursesByDepartmentId($departmentId)
    {
        return Course::where('department_id', $departmentId)->get();
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'prerequisite_id');
    }
}
