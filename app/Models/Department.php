<?php

namespace App\Models;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'name',
        'code',
    ];

    protected static function newFactory()
    {
        return DepartmentFactory::new();
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    //returns the students in each course
    public function students_in_courses()
    {
        return $this->hasManyThrough(User::class, Course::class)->distinct();
    }

    public function total_students()
    {
        return $this->students()->count();
    }

    public function professors()
    {
        return $this->hasMany(User::class, 'department_id')->where('role', Role::PROFESSOR);
    }


}
