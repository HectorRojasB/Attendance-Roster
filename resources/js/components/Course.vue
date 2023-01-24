<script setup>
import { onMounted } from "vue";
import { getStudentsFromCourse, getCourses } from "../utils/apiRoutes";
import { store } from "../utils/store.js";

onMounted(() => {
    getCourses();
});
</script>
<template>
    <div class="text-start course-container">
        <p class="label">Choose a course</p>
        <div class="text-center select-course-container">
            <select
                v-model="store.selectedCourseId"
                class="form-select"
                aria-label="Default select example"
                @change="getStudentsFromCourse(store.selectedCourseId)"
            >
                <option disabled selected>Select a course</option>
                <option v-for="course in store.courses.data" :value="course.id" :key="course.id">
                    {{ course.name }}
                </option>
            </select>
        </div>
    </div>
</template>
