<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreStudentRequest;

class StudentsController extends Controller
{
    public function index(): JsonResponse
    {
        $students = Student::orderBy("last_name")->get();
        return response()->json(["data" => $students]);
    }

    public function store(StoreStudentRequest $request, Student $student): JsonResponse
    {
        $student = Student::create([
            "student_id" => $request->student_id,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
        ]);
        return response()->json(["message" => "STUDENT_ADDED", "data" => $student]);
    }

    public function update(StoreStudentRequest $request, Student $student): JsonResponse
    {
        $student->update([
            "student_id" => $request->student_id,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
        ]);
        return response()->json(["message" => "STUDENT_UPDATED", "data" => $student]);
    }

    public function destroy(Student $student): JsonResponse
    {
        $student->delete();
        return response()->json(["message" => "STUDENT_DELETED", "data" => null]);
    }
}
