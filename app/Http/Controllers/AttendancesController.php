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
    public function index()
    {
    }

    public function store(StoreAttendanceRequest $request): JsonResponse
    {
        $attendance = Attendance::create([
            "student_id" => $request->student_id,
            "course_id" => $request->course_id,
            "present" => $request->present,
            "attendance_date" => $request->attendance_date,
        ]);
        return response()->json(["message" => "ATTENDANCE_CREATED", "data" => $attendance]);
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
