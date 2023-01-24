import axios from "axios";
import { store } from "./store";

export const getCourses = () => {
    return axios.get("/api/courses").then((response) => {
        store.courses = response.data;
    });
};

export const getStudentsFromCourse = (id) => {
    return axios.get(`/api/courses/${id}/students`).then((response) => {
        store.students = Object.values(response.data.data).map((student) => {
            return {
                id: student.id,
                name: `${student.last_name} ${student.first_name}`,
                present: false,
            };
        });
    });
};

export const postAttendance = (data) => {
    return axios
        .post("/api/attendances", {
            course_id: data.course_id,
            students: data.students,
            attendance_date: data.attendance_date,
        })
        .then(() => {
            (store.students = []), (store.selectedCourseId = 0);
        });
};
