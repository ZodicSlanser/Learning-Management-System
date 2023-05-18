<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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


    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'prerequisite_id');
    }

    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function is_enrolled($user_id)
    {
        return $this->students()->where('users.id', $user_id)->exists();
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }
}
