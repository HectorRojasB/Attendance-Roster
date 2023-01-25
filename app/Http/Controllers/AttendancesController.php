<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreAttendanceRequest;

class AttendancesController extends Controller
{
    public function store(StoreAttendanceRequest $request): JsonResponse
    {
        foreach ($request->students as $student) {
            $attendances[] = [
                "student_id" => $student["id"],
                "present" => $student["present"],
                "course_id" => $request->course_id,
                "attendance_date" => $request->attendance_date,
            ];
        }

        Attendance::insert($attendances);
        return response()->json(["message" => "ATTENDANCE_CREATED", "data" => null]);
    }
}
