<?php

namespace App\Models;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
   use HasFactory;
    protected $fillable = [
        'name',
        'code',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function professors()
    {
        return $this->hasMany(User::class, 'department_id');
    }
    protected static function newFactory()
    {
        return DepartmentFactory::new();
    }
}
