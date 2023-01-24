<script setup>
import { store } from "../utils/store.js";
import { postAttendance } from "../utils/apiRoutes";

const formattedDate = (newDate) => newDate.getFullYear() + "-" + (newDate.getMonth() + 1) + "-" + newDate.getDate();
const saveAttendances = () => {
    let newDate = new Date();
    let data = {
        course_id: store.selectedCourseId,
        students: store.students,
        attendance_date: formattedDate(newDate),
    };
    postAttendance(data);
};
</script>
<template>
    <form @submit.prevent="saveAttendances()">
        <div class="students-container">
            <h4>Students</h4>
            <div class="card" v-for="student in store.students" :key="student.id">
                <div class="d-flex card-body">
                    <input v-model="student.present" class="form-check-input" type="checkbox" :value="student.id" />
                    {{ student.name }}
                </div>
            </div>
        </div>

        <div class="send-button-container">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</template>
