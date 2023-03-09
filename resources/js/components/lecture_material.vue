<template>
  <div>
    <sidebar active="lecture-materials"></sidebar>
    <div class="relative md:ml-64 bg-blueGray-50">
      <top-nav page_title="Lecture Materials"></top-nav>
      <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12"></div>
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="w-full px-4">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
            v-if="material"
          >
            <div class="rounded-t bg-white mb-0 px-6 py-6">
              <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">Add Lecture Materials</h6>
                <button
                  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                  type="button"
                  @click="addMaterial"
                >
                  Close
                </button>
              </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <form @submit.prevent="store">
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
        <div class="w-full px-4">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
          >
            <div class="rounded-t bg-white mb-0 px-6 py-6">
              <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">Lecture Materials</h6>
                <button
                  class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                  type="button"
                  @click="addMaterial"
                >
                  Add Material
                </button>
              </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <div class="block w-full overflow-x-auto mt-5">
                <!-- Projects table -->
                <table class="items-center w-full bg-transparent border-collapse">
                  <thead>
                    <tr>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Title
                      </th>

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
                        Credits
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Content
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Video
                      </th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="mat in materials" :key="mat.id">
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ mat.title }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ mat.course_title }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ mat.course_code }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ mat.level }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ mat.semester }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ mat.credits }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        <span v-if="mat.content" class="text-lime-500">Yes</span
                        ><span v-else class="text-red-500">No</span>
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        <span v-if="mat.video" class="text-lime-500">Yes</span
                        ><span v-else class="text-red-500">No</span>
                      </td>
                      <td>
                        <router-link
                          class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                          :to="{ name: 'edit-lecture-material', params: { id: mat.id } }"
                          >Edit</router-link
                        >
                        <button
                          class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                          type="button"
                          @click="deleteMaterial(mat.id)"
                        >
                          Delete
                        </button>
                      </td>
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
      courses: [],
      materials: [],
      id: "",
      form: {
        course: "",
        title: "",
        content: "",
        video: "",
        user_id: "",
      },
      errors: {},
      material: false,
    };
  },
  created() {
    this.login();
    this.getCourses();
    this.getMaterials();
  },
  methods: {
    addMaterial() {
      if (!this.material) {
        this.material = true;
      } else {
        this.material = false;
      }
    },
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
    getMaterials() {
      axios
        .get("/api/v1/materials/" + this.id)
        .then(({ data }) => (this.materials = data))
        .catch();
    },
    store() {
      const data = new FormData();
      data.append("user_id", this.id);
      data.append("title", this.form.title);
      data.append("course", this.form.course);
      data.append("video", this.form.video);
      data.append("content", this.form.content);

      axios
        .post("api/v1/material", data)
        .then((response) => {
          this.$router.push({
            name: "dashboard",
          });

          Toast.fire({
            icon: "success",
            title: "Successfully done",
          });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
    deleteMaterial(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .delete("/api/v1/material/" + id)
            .then(() => {
              this.materials = this.materials.filter((material) => {
                return material.id != id;
              });
            })
            .catch(() => {
              this.$router.push({
                name: "lecture-material",
              });
              this.getMaterials();
            });
          Swal.fire("Deleted!", "A material has been deleted.", "success");
        }
      });
    },
  },
};
</script>
