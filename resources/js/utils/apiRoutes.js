import axios from "axios";
import { store } from "./store";

export const getCourses = () => {
    return axios.get("/api/courses").then((response) => {
        store.courses = response.data;
    });
};

export const getStudents = () => {
    return axios.get("/api/students").then((response) => {
        store.students = response.data;
    });
};
