<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Enroll;
use App\Models\Course;
use App\Models\Student;

class EnrollSeeder extends Seeder
{
    public function run()
    {
        $students = Student::all();
        $course = Course::all()->first();

        foreach ($students as $student) {
            Enroll::create([
                "student_id" => $student->id,
                "course_id" => $course->id,
            ]);
        }
    }
}
