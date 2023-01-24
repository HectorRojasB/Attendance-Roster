<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRequest extends FormRequest
{
    public function rules()
    {
        return [
            "student_id" => "required|exists:students,id",
            "course_id" => "required|exists:courses,id",
            "present" => "required|boolean",
            "attendance_date" => "required|date",
        ];
    }
}
