<script setup>
import { onMounted } from "vue";
import { store } from "../../utils/store.js";
import { getCourses, getStudents } from "../../utils/apiRoutes";

const dateOptions = { weekday: "long", year: "numeric", month: "long", day: "numeric" };
const currentDate = new Date().toLocaleDateString("en-US", dateOptions);

onMounted(() => {
    getCourses();
    getStudents();
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
                        <select class="form-select" aria-label="Default select example">
                            <option disabled selected>Select a course</option>
                            <option v-for="course in store.courses.data" :key="course.id">
                                {{ course.name }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="students-container">
                    <h4>Students</h4>
                    <div class="card" v-for="student in store.students.data">
                        <div class="d-flex card-body">
                            <input class="form-check-input" type="checkbox" value="" />
                            {{ student.last_name }}, {{ student.first_name }}
                        </div>
                    </div>
                </div>

                <div class="send-button-container">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>
