<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("attendances", function (Blueprint $table) {
            $table->id();
            $table->date("attendance_date");
            $table->boolean("present")->default(false);
            $table->foreignId("student_id")->constrained();
            $table->foreignId("course_id")->constrained();
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("attendances");
    }
};
