<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreEnrollRequest;

class EnrollsController extends Controller
{
    public function store(StoreEnrollRequest $request)
    {
        $student = Student::find($request->student_id);
        if ($student->courses->contains($request->course_id)) {
            return response()->json(["message" => "STUDENT_ALREADY_ENROLLED", "data" => null]);
        }

        $enroll = Enroll::create([
            "student_id" => $request->student_id,
            "course_id" => $request->course_id,
        ]);
        return response()->json(["message" => "STUDENT_ENROLLED", "data" => null]);
    }
}
