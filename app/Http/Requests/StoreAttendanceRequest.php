<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueAttendanceRule;

class StoreAttendanceRequest extends FormRequest
{
    public function rules()
    {
        return [
            "students" => "required|array",
            "students.*.id" => "required|exists:students,id",
            "students.*.present" => "required|boolean",
            "course_id" => "required|exists:courses,id",
            "attendance_date" => ["required", new UniqueAttendanceRule()],
        ];
    }
}
