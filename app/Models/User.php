<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'academic_number',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

    public function courses()
    {
        if ($this->role === Role::PROFESSOR) {
            return $this->hasMany(Course::class, 'professor_id');
        }
        else if($this->role === Role::STUDENT) {
            return $this->belongsToMany(Course::class, 'enrollments', 'user_id', 'course_id');
        }
            return null;
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
