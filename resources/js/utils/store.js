import { reactive } from "vue";

export const store = reactive({
    courses: [],
    students: [],
    selectedCourseId: 0,
});
