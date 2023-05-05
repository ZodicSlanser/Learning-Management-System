<?php

namespace App\Models;

use Database\Factories\EnrollmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    const GRADE_A = 90;
    const GRADE_B = 80;
    const GRADE_C = 70;
    const GRADE_D = 60;

    protected $fillable = [
        'student_id',
        'course_id',
        'grade'
    ];

    protected static function newFactory()
    {
        return EnrollmentFactory::new();
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function enroll(User $student, Course $course): bool
    {
//if student is enrolled in the course then return false
        if ($this->is_enrolled($student, $course)) return false;

//if this course has no prerequisites then enroll them
        if (!$course->prerequisite) {
            $this->student_id = $student->id;
            $this->course_id = $course->id;
            $this->save();
            return true;
        }
//if this course has prerequisites and student is not enrolled in the course then check if he has passed all the prerequisites
        if ($course->prerequisite && $this->hasPassedPrerequisite($student, $course->prerequisite)) {
            $this->student_id = $student->id;
            $this->course_id = $course->id;
            $this->save();
            return true;
        }

        return false;
    }

    public function is_enrolled(User $student, Course $course): bool
    {
        return $this->student_id === $student->id && $this->course_id === $course->id;
    }

    public function hasPassedPrerequisite(User $student, Course $prerequisite): bool
    {
        $enrollment = $this->where('student_id', $student->id)
            ->where('course_id', $prerequisite->id)
            ->first();

        if (!$enrollment || !$this->has_passed($enrollment)) {
            return false;
        }

        return true;
    }

    public function has_passed(Enrollment $enrollment): bool
    {
        return $enrollment->grade >= self::GRADE_D;
    }

    public function letter_grade(): string
    {
        $numeric_grade = $this->grade;

        if ($numeric_grade >= self::GRADE_A) return 'A';
        elseif ($numeric_grade >= self::GRADE_B) return 'B';
        elseif ($numeric_grade >= self::GRADE_C) return 'C';
        elseif ($numeric_grade >= self::GRADE_D) return 'D';
        return 'F';

    }

    public function drop(User $student, Course $course): bool
    {
        if (!$this->is_enrolled($student, $course)) return false; // student is not enrolled in the course
        $this->delete();
        return true;
    }

    public function update_grade(User $student, Course $course, int $new_grade): bool
    {
        if (!$this->is_enrolled($student, $course)) return false; // student is not enrolled in the course
        $this->grade = $new_grade;
        $this->save();
        return true;
    }
}
