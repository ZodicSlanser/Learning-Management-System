<?php

namespace App\Models;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

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

    public function professors()
    {
        return $this->hasMany(User::class, 'department_id');
    }
}
