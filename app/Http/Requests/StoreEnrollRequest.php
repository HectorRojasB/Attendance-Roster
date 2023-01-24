<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnrollRequest extends FormRequest
{
    public function rules()
    {
        return [
            "student_id" => "required|exists:students,id",
            "course_id" => "required|exists:courses,id",
        ];
    }
}
