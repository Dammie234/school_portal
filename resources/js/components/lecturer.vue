<template>
  <div>
    <sidebar active="lecturer"></sidebar>
    <div class="relative md:ml-64 bg-blueGray-50">
      <top-nav page_title="Lecturer"></top-nav>
      <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12"></div>
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div
          class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
        >
          <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
              <h6 class="text-blueGray-700 text-xl font-bold">
                Add Lecturer {{ form.name }}
              </h6>
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
                      Name
                    </label>
                    <input
                      type="text"
                      v-model="form.name"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    />
                    <small class="text-red-500" v-if="errors.name">{{
                      errors.name[0]
                    }}</small>
                  </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      htmlfor="grid-password"
                    >
                      Email address
                    </label>
                    <input
                      type="email"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      v-model="form.email"
                    />
                    <small class="text-red-500" v-if="errors.email">{{
                      errors.email[0]
                    }}</small>
                  </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                  <div class="flex lg:flex-col flex-row">
                    <div class="w-full md:w-2/3 mb-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlfor="grid-password"
                      >
                        Password
                      </label>
                      <input
                        type="text"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        v-model="form.password"
                      />
                    </div>
                    <div class="w-full md:w-1/3 mb-3 ml-3 mt-5">
                      <button
                        class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                        type="button"
                        @click="generatePassword"
                      >
                        Generate Password
                      </button>
                    </div>
                  </div>
                  <small class="text-red-500" v-if="errors.password">{{
                    errors.password[0]
                  }}</small>
                </div>
                <div class="w-full lg:w-3/12 px-4">
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      htmlfor="grid-password"
                    >
                      Gender
                    </label>
                    <select
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      v-model="form.gender"
                    >
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    <small class="text-red-500" v-if="errors.gender">{{
                      errors.gender[0]
                    }}</small>
                  </div>
                </div>
                <div class="w-full lg:w-3/12 px-4">
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
                    >
                      <option value=""></option>
                      <option v-for="dept in departments" :key="dept.id" :value="dept.id">
                        {{ dept.name }}
                      </option>
                    </select>
                    <small class="text-red-500" v-if="errors.department">{{
                      errors.department[0]
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
      <div class="px-4 md:px-10 mx-auto w-full mt-20">
        <div
          class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
        >
          <div class="rounded-t bg-white mb-0 px-6 py-6">
            <div class="text-center flex justify-between">
              <h6 class="text-blueGray-700 text-xl font-bold">Lecturers</h6>
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
                      Name
                    </th>
                    <th
                      class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                    >
                      Email
                    </th>
                    <th
                      class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                    >
                      Gender
                    </th>

                    <th
                      class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                    ></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="lec in lecturers" :key="lec.id">
                    <td
                      class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                    >
                      {{ lec.name }}
                    </td>
                    <td
                      class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                    >
                      {{ lec.email }}
                    </td>
                    <td
                      class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                    >
                      {{ lec.gender }}
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
</template>
<script>
export default {
  name: "lecturer",
  data() {
    return {
      departments: [],
      form: {
        name: "",
        email: "",
        password: "",
        gender: "",
        department: "",
      },
      lecturers: [],
      errors: {},
    };
  },

  mounted() {
    this.login();
    this.getDepartments();
    this.getLecturers();
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
        .get("api/v1/departments")
        .then(({ data }) => (this.departments = data))
        .catch();
    },
    getLecturers() {
      axios
        .get("/api/v1/lecturer")
        .then(({ data }) => (this.lecturers = data))
        .catch();
    },
    generatePassword() {
      let result = "",
        length = 10;
      const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      const charactersLength = characters.length;
      let counter = 0;
      while (counter < length) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        counter += 1;
      }
      this.form.password = result;
    },
    store() {
      axios
        .post("/api/v1/lecturer", this.form)
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
