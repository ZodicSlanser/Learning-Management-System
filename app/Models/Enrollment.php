<?php

namespace App\Models;

use Database\Factories\EnrollmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'course_id',
        'grade'
    ];

    protected static function newFactory()
    {
        return EnrollmentFactory::new();
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
            $student->courses()->attach($course->id);
            return true;
        }
        //if this course has prerequisites and student is not enrolled in the course then check if he has passed all the prerequisites
        if ($course->prerequisite && $this->hasPassedPrerequisite($student, $course->prerequisite)) {
            $student->courses()->attach($course->id);
            return true;
        }
        return false;
    }

    public function is_enrolled(User $student, Course $course): bool
    {
        return $this->student_id === $student->id && $this->course_id === $course->id && !$course->trashed();
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
        return $enrollment->grade >= Grades::GRADE_D;
    }

    public function letter_grade(): string
    {
        $numeric_grade = $this->grade;

        if ($numeric_grade >= Grades::GRADE_A) return 'A';
        elseif ($numeric_grade >= Grades::GRADE_B) return 'B';
        elseif ($numeric_grade >= Grades::GRADE_C) return 'C';
        elseif ($numeric_grade >= Grades::GRADE_D) return 'D';
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

    public function average_grade(): ?float
    {
        $grades = $this->student()->pluck('grade')->filter();

        if ($grades->isEmpty()) {
            return null;
        }

        return $grades->average();
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    



//------------------------------------------------------------------------------------------------------------------

public function if_stu_pass(Enrollment $enrollment ): bool
{
   return $enrollment->grade >= Grades::GRADE_D;
}


public function is_enrolled_before(User $student, Course $course): bool
{
    //array contain value of one row of enrollment  
    $enrollment = $this->where('student_id', $student->id)
    ->where('course_id', $course->id)
    ->first();

    //return true if there row contain two value together in table enrollment
    if ($enrollment) {
        return true;
    } else {
        return false;
    }

    // return $this->where('student_id', ) === $student->id && $this->course_id === $course->id && !$course->trashed();
}


public function if_stu_pass_inpreq(User $student, $prerequisite_id): bool
    {
        //array contain value of one row of enrollment -> stu_id , pre_req
        $enrollment = $this->where('student_id', $student->id)
            ->where('course_id', $prerequisite_id)
            ->first();

        if (!$enrollment) {
            return true;
        }

        //if ($enrollment && $this->if_stu_pass($enrollment)) return true --- else return false 

        if (!$this->if_stu_pass($enrollment)) {
            return false;
        }

        return true;
    }



public function reg_new_enroll(User $student, Course $course): bool
    {
        //if student is enrolled in the course then return false
        if ($this->is_enrolled_before($student, $course)) return false;

        //if this course has no prerequisites then enroll them
        if (!$course->prerequisite_id) {
            return true;
        }
        //if this course has prerequisites and student is not enrolled in the course then check if he has passed all the prerequisites
        if ($course->prerequisite_id && $this->if_stu_pass_inpreq($student, $course->prerequisite_id)) {
            
            return true;
        }


        return false;
    }










}
