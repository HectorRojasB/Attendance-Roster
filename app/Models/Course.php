<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ["name"];

    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, "enrolls");
    }
}
