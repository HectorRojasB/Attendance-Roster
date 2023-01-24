<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ["student_id", "first_name", "last_name", "email"];

    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, "enrolls");
    }
}
