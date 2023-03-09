<template>
  <div>
    <sidebar active="lecturer-courses"></sidebar>
    <div class="relative md:ml-64 bg-blueGray-50">
      <top-nav page_title="Lecturer Courses"></top-nav>
      <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12"></div>
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="w-full px-4">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
          >
            <div class="rounded-t bg-white mb-0 px-6 py-6">
              <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">Add Lecturer Course</h6>
                <button
                  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                  type="button"
                >
                  Settings
                </button>
              </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <form @submit.prevent="store">
                <div class="flex flex-wrap">
                  <div class="w-full lg:w-4/12 px-4">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlfor="grid-password"
                      >
                        Departments
                      </label>
                      <select
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        v-model="form.department"
                        @change="getCourses"
                      >
                        <option value=""></option>
                        <option
                          v-for="dept in departments"
                          :key="dept.id"
                          :value="dept.id"
                        >
                          {{ dept.name }}
                        </option>
                      </select>
                      <small class="text-red-500" v-if="errors.department">{{
                        errors.department[0]
                      }}</small>
                    </div>
                  </div>
                  <div class="w-full lg:w-4/12 px-4" v-if="form.department">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlfor="grid-password"
                      >
                        Courses
                      </label>
                      <select
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        v-model="form.course"
                      >
                        <option value=""></option>
                        <option
                          v-for="course in courses"
                          :key="course.id"
                          :value="course.id"
                        >
                          {{ course.course_title }}
                        </option>
                      </select>
                      <small class="text-red-500" v-if="errors.course">{{
                        errors.course[0]
                      }}</small>
                    </div>
                  </div>
                  <div class="w-full lg:w-4/12 px-4">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlfor="grid-password"
                      >
                        Lecturers
                      </label>
                      <select
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        v-model="form.lecturer"
                      >
                        <option value=""></option>
                        <option
                          v-for="lec in lecturers"
                          :key="lec.id"
                          :value="lec.user_id"
                        >
                          {{ lec.name }}
                        </option>
                      </select>
                      <small class="text-red-500" v-if="errors.lecturer">{{
                        errors.lecturer[0]
                      }}</small>
                    </div>
                  </div>
                </div>
                <input
                  type="submit"
                  value="Submit"
                  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                />
              </form>
            </div>
          </div>
        </div>

        <div class="w-full px-4">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
          >
            <div class="rounded-t bg-white mb-0 px-6 py-6">
              <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">Course Lecturers</h6>
                <button
                  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                  type="button"
                >
                  Settings
                </button>
              </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <div class="block w-full overflow-x-auto">
                <!-- Projects table -->
                <table class="items-center w-full bg-transparent border-collapse">
                  <thead>
                    <tr>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Course Title
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Course Code
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Level
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Semester
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Credit
                      </th>

                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Status
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Lecturer Name
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      ></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="lec in course_lecturers" :key="lec.id">
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ lec.course_title }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ lec.course_code }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ lec.level }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ lec.semester }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ lec.credits }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ lec.status }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ lec.name }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      ></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "lecturer",
  data() {
    return {
      departments: [],
      courses: [],
      lecturers: [],
      course_lecturers: [],
      form: {
        department: "",
        course: "",
        lecturer: "",
      },
      errors: {},
    };
  },
  created() {
    this.login();
    this.getDepartments();
    this.getLecturers();
    this.getCourseLecturers();
  },
  methods: {
    login() {
      if (!User.loggedIn()) {
        this.$router.push({
          name: "login",
        });
      }
    },
    getDepartments() {
      axios
        .get("/api/v1/departments")
        .then(({ data }) => (this.departments = data))
        .catch();
    },
    getCourses() {
      axios
        .get("/api/v1/course/" + this.form.department)
        .then(({ data }) => (this.courses = data))
        .catch();
    },
    getLecturers() {
      axios
        .get("/api/v1/lecturer")
        .then(({ data }) => (this.lecturers = data))
        .catch();
    },
    getCourseLecturers() {
      axios
        .get("/api/v1/course-lecturers")
        .then(({ data }) => (this.course_lecturers = data))
        .catch();
    },
    store() {
      axios
        .post("/api/v1/course-lecturer", this.form)
        .then((response) => {
          this.$router.push({
            name: "dashboard",
          });
          Toast.fire({
            icon: "success",
            title: "Successfully Done",
          });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>
