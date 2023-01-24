<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function rules()
    {
        return [
            "student_id" => "required|numeric|unique:students,student_id",
            "first_name" => "required|string",
            "last_name" => "required|string",
            "email" => "required|email",
        ];
    }
}
