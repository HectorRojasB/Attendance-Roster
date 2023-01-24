<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreCourseRequest;

class CoursesController extends Controller
{
    public function index(): JsonResponse
    {
        $courses = Course::all();
        return response()->json(["data" => $courses]);
    }

    public function store(StoreCourseRequest $request): JsonResponse
    {
        $course = Course::create([
            "name" => $request->name,
        ]);
        return response()->json(["message" => "COURSE_CREATED", "data" => $course]);
    }

    public function update(StoreCourseRequest $request, Course $course)
    {
        $course->update([
            "name" => $request->name,
        ]);
        return response()->json(["message" => "COURSE_UPDATED", "data" => $course]);
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(["message" => "COURSE_DELETED", "data" => null]);
    }
}
