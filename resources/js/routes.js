
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let logout = require('./components/auth/logout.vue').default;
let student_register = require('./components/auth/student_register.vue').default;

let dashboard = require('./components/dashboard.vue').default;
let lecturer = require('./components/lecturer.vue').default;
let lecturer_course = require('./components/lecturer_course.vue').default;
let lecturer_courses = require('./components/lecturer_courses.vue').default;
let lecture_material = require('./components/lecture_material.vue').default;
let edit_lecture_material = require('./components/edit_lecture_material.vue').default;

let my_courses = require('./components/my_courses.vue').default;
let my_material = require('./components/my_material.vue').default;
export const routes = [
    {path: '/', component: login, name: 'login'},
    {path: '/register', component: register, name: 'register'},
    {path: '/logout', component: logout, name: 'logout'},
    {path: '/student-register', component: student_register, name: 'student-register'},

    {path: '/dashboard', component: dashboard, name: 'dashboard'},
    {path: '/lecturer', component: lecturer, name: 'lecturer'},
    {path: '/lecturer-courses', component: lecturer_course, name: 'lecturer-course  '},
    {path: '/my-courses', component: lecturer_courses, name: 'my-courses'},
    {path: '/lecture-materials', component: lecture_material, name: 'lecture-material'},
    {path: '/lecture-materials/edit/:id', component: edit_lecture_material, name: 'edit-lecture-material'},
    {path: '/student/courses', component: my_courses, name: 'student-courses'},
    {path: '/student/materials/:course_id', component: my_material, name: 'student-materials'},


];