<script setup>
import Course from "../Course.vue";
import Students from "../Students.vue";
import { store } from "../../utils/store.js";

const dateOptions = { weekday: "long", year: "numeric", month: "long", day: "numeric" };
const currentDate = new Date().toLocaleDateString("en-US", dateOptions);
</script>
<template>
    <div class="container home">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-5 col-sm-12 main-container">
                <h3 class="fw-bold">Attendance</h3>
                <h5>{{ currentDate }}</h5>
                <Course />
                <div v-if="store.students.length != 0">
                    <Students />
                </div>
            </div>
        </div>
    </div>
</template>
