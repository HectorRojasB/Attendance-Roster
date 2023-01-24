<script setup>
import { onMounted, ref } from "vue";
import { store } from "../../utils/store.js";
import { getCourses, getStudentsFromCourse, postAttendance } from "../../utils/apiRoutes";

const selectedCourseId = ref();
const dateOptions = { weekday: "long", year: "numeric", month: "long", day: "numeric" };
const currentDate = new Date().toLocaleDateString("en-US", dateOptions);

const saveAttendances = () => {
    let newDate = new Date();
    let data = {
        course_id: selectedCourseId.value,
        students: store.students,
        attendance_date: newDate.getFullYear() + "-" + (newDate.getMonth() + 1) + "-" + newDate.getDate(),
    };
    postAttendance(data);
};

onMounted(() => {
    getCourses();
});
</script>
<template>
    <div class="container home">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-5 col-sm-12 main-container">
                <h3 class="fw-bold">Attendance</h3>
                <h5>{{ currentDate }}</h5>

                <div class="text-start course-container">
                    <p class="label">Choose a course</p>
                    <div class="text-center select-course-container">
                        <select
                            v-model="selectedCourseId"
                            class="form-select"
                            aria-label="Default select example"
                            @change="getStudentsFromCourse(selectedCourseId)"
                        >
                            <option disabled selected>Select a course</option>
                            <option v-for="course in store.courses.data" :value="course.id" :key="course.id">
                                {{ course.name }}
                            </option>
                        </select>
                    </div>
                </div>

                <div v-if="store.students.length != 0">
                    <form @submit.prevent="saveAttendances()">
                        <div class="students-container">
                            <h4>Students</h4>
                            <div class="card" v-for="student in store.students" :key="student.id">
                                <div class="d-flex card-body">
                                    <input
                                        v-model="student.present"
                                        class="form-check-input"
                                        type="checkbox"
                                        :value="student.id"
                                    />
                                    {{ student.name }}
                                </div>
                            </div>
                        </div>

                        <div class="send-button-container">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
