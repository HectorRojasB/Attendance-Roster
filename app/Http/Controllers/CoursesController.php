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

    public function update(StoreCourseRequest $request, Course $course): JsonResponse
    {
        $course->update([
            "name" => $request->name,
        ]);
        return response()->json(["message" => "COURSE_UPDATED", "data" => $course]);
    }

    public function destroy(Course $course): JsonResponse
    {
        $course->delete();
        return response()->json(["message" => "COURSE_DELETED", "data" => null]);
    }

    public function getStudents(Course $course): JsonResponse
    {
        return response()->json(["data" => $course->students->sortBy("last_name")]);
    }

    public function getAttendances(Course $course): JsonResponse
    {
        $studentAttendances = $course
            ->attendances()
            ->with("student")
            ->get();
        return response()->json(["data" => $studentAttendances]);
    }

    public function getByDate(Request $request, Course $course): JsonResponse
    {
        $request->validate([
            "date" => "required|date",
        ]);

        $attendances = $course
            ->attendances()
            ->where("attendance_date", $request->date)
            ->with("student")
            ->get();
        return response()->json(["data", $attendances]);
    }
}
