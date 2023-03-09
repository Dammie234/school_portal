<template>
  <div>
    <sidebar active="lecture-materials"></sidebar>
    <div class="relative md:ml-64 bg-blueGray-50">
      <top-nav page_title="Edit Lecturer Material"></top-nav>
      <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12"></div>
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="w-full px-4">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
          >
            <div class="rounded-t bg-white mb-0 px-6 py-6">
              <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">My account</h6>
                <button
                  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                  type="button"
                >
                  Settings
                </button>
              </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <form @submit.prevent="update">
                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                  Lecturer Information
                </h6>
                <div class="flex flex-wrap">
                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlfor="grid-password"
                      >
                        Title
                      </label>
                      <input
                        type="text"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        v-model="form.title"
                      />
                      <small class="text-red-500" v-if="errors.title">{{
                        errors.title[0]
                      }}</small>
                    </div>
                  </div>
                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlfor="grid-password"
                      >
                        Content
                      </label>
                      <input
                        type="text"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        v-model="form.content"
                      />
                      <small class="text-red-500" v-if="errors.content">{{
                        errors.content[0]
                      }}</small>
                    </div>
                  </div>
                  <div class="w-full lg:w-6/12 px-4">
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
                        <option value="">Select Course</option>
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

                  <div class="w-full lg:w-6/12 px-4">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlfor="grid-password"
                      >
                        Video Content
                      </label>
                      <input
                        type="text"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        v-model="form.video"
                      />
                      <small class="text-red-500" v-if="errors.video">{{
                        errors.video[0]
                      }}</small>
                    </div>
                  </div>
                </div>
                <input
                  type="submit"
                  value="submit"
                  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "edit-material",
  data() {
    return {
      form: {},
      courses: [],
      errors: {},
      id: "",
    };
  },
  created() {
    this.login();
    this.getMaterial();
    this.getCourses();
  },
  methods: {
    login() {
      if (!User.loggedIn()) {
        this.$router.push({
          name: "login",
        });
      } else {
        this.id = User.id();
      }
    },
    getCourses() {
      axios
        .get("/api/v1/lecturer-courses/" + this.id)
        .then(({ data }) => (this.courses = data))
        .catch();
    },
    getMaterial() {
      let id = this.$route.params.id;
      axios
        .get("/api/v1/material/" + id)
        .then(({ data }) => (this.form = data))
        .catch();
    },
    update() {
      let id = this.$route.params.id;
      axios
        .patch("/api/v1/update-material/" + id, this.form)
        .then((response) => {
          this.$router.push({
            name: "lecture-material",
          });

          Toast.fire({
            icon: "success",
            title: "Successfully done",
          });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>
