import axios from "axios";
import { store } from "./store";

export const getCourses = () => {
    return axios.get("/api/courses").then((response) => {
        store.courses = response.data;
    });
};

export const getStudentsFromCourse = (id) => {
    return axios.get(`/api/courses/${id}/students`).then((response) => {
        store.students = response.data;
    });
};
