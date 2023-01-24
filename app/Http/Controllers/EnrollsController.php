<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreEnrollRequest;

class EnrollsController extends Controller
{
    public function store(StoreEnrollRequest $request): JsonResponse
    {
        $enroll = Enroll::create([
            "student_id" => $request->student_id,
            "course_id" => $request->course_id,
        ]);
        return response()->json(["message" => "ENROLL_CREATED", "data" => $enroll]);
    }
}
