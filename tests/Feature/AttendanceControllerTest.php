<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Attendance;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttendanceControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->student1 = new Student([
            "student_id" => 2205092601799,
            "first_name" => "Hayley",
            "last_name" => "Williams",
            "email" => "hayley.is_cool@ultricessitamet.co.uk",
        ]);
        $this->student1->save();
        $this->student2 = new Student([
            "student_id" => 2245092601799,
            "first_name" => "Taylor",
            "last_name" => "York",
            "email" => "guitar.is_cool@ultriddcessitamet.co.uk",
        ]);
        $this->student2->save();
        $this->course = new Course([
            "name" => "Math 101",
        ]);
        $this->course->save();
        $this->enroll1 = new Enroll([
            "student_id" => $this->student1->id,
            "course_id" => $this->course->id,
        ]);
        $this->enroll1->save();
        $this->enroll2 = new Enroll([
            "student_id" => $this->student2->id,
            "course_id" => $this->course->id,
        ]);
        $this->enroll2->save();
    }

    public function testStore()
    {
        $response = $this->postJson("/api/attendances", [
            "attendance_date" => "2022-01-01",
            "students" => [
                [
                    "id" => $this->student1->id,
                    "present" => true,
                ],
                [
                    "id" => $this->student2->id,
                    "present" => false,
                ],
            ],
            "course_id" => $this->course->id,
        ]);
        $response->assertStatus(200);
        $response->assertJson(["message" => "ATTENDANCE_CREATED", "data" => null]);
        $this->assertDatabaseHas("attendances", [
            "attendance_date" => "2022-01-01",
            "student_id" => $this->student1->id,
            "present" => true,
            "course_id" => $this->course->id,
        ]);
        $this->assertDatabaseHas("attendances", [
            "attendance_date" => "2022-01-01",
            "student_id" => $this->student2->id,
            "present" => false,
            "course_id" => $this->course->id,
        ]);
    }
}
