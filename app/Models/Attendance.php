<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ["student_id", "course_id", "present", "attendance_date"];
    public function course()
    {
        return $this->hasMany(Course::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::Class);
    }
    public function scopeSearchForDuplicates($query, $student_id, $course_id, $date)
    {
        return $query
            ->where("student_id", $student_id)
            ->where("course_id", $course_id)
            ->where("attendance_date", $date);
    }
}
