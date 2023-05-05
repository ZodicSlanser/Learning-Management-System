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
    private mixed $grade;
    const GRADE_A = 90;
    const GRADE_B = 80;
    const GRADE_C = 70;
    const GRADE_D = 60;

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

    public function letter_grade(): string
    {
        $numeric_grade = $this->grade;

        if ($numeric_grade >= self::GRADE_A) {
            return 'A';
        } elseif ($numeric_grade >= self::GRADE_B) {
            return 'B';
        } elseif ($numeric_grade >= self::GRADE_C) {
            return 'C';
        } elseif ($numeric_grade >= self::GRADE_D) {
            return 'D';
        } else {
            return 'F';
        }
    }
}
