<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

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

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }

    public function getEnrollments()
    {
        return $this->enrollments()->with('student')->get();
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

}
