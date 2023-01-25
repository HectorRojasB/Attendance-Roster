<?php

namespace App\Rules;

use App\Models\Attendance;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\InvokableRule;

class UniqueAttendanceRule implements DataAwareRule, InvokableRule
{
    protected $data = [];

    public function __invoke($attribute, $value, $fail)
    {
        $studentsId = collect($this->data["students"])->pluck("id");
        $attendances = Attendance::whereIn("student_id", $studentsId)
            ->where("course_id", $this->data["course_id"])
            ->where("attendance_date", $this->data["attendance_date"]);

        if ($attendances->exists()) {
            $fail("ATTENDENCE_ALREADY_REGISTERED");
        }
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
