<template>
  <main>
    <section class="relative w-full h-full py-40 min-h-screen">
      <div
        class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
        style="background-image: url(../../assets/img/register_bg_2.png)"
      ></div>
      <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
          <div class="w-full lg:w-6/12 px-4">
            <div
              class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
            >
              <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                  <h6 class="text-blueGray-500 text-xl font-bold">Sign up</h6>
                </div>

                <hr class="mt-6 border-b-1 border-blueGray-300" />
              </div>
              <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form @submit.prevent="signup">
                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      htmlFor="grid-password"
                    >
                      Name
                    </label>
                    <input
                      type="text"
                      v-model="form.name"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      placeholder="Name"
                    />
                    <small class="text-red-500 font-medium" v-if="errors.name">{{
                      errors.name[0]
                    }}</small>
                  </div>

                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      htmlFor="grid-password"
                    >
                      Email
                    </label>
                    <input
                      type="email"
                      v-model="form.email"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      placeholder="Email"
                    />
                    <small class="text-red-500 font-medium" v-if="errors.email">{{
                      errors.email[0]
                    }}</small>
                  </div>

                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      htmlFor="grid-password"
                    >
                      Password
                    </label>
                    <input
                      type="password"
                      v-model="form.password"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      placeholder="Password"
                    />
                    <small class="text-red-500 font-medium" v-if="errors.password">{{
                      errors.password[0]
                    }}</small>
                  </div>

                  <div class="relative w-full mb-3">
                    <label
                      class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                      htmlFor="grid-password"
                    >
                      Confirm Password
                    </label>
                    <input
                      type="password"
                      v-model="form.password_confirmation"
                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                      placeholder="Confirm Password"
                    />
                    <small
                      class="text-red-500 font-medium"
                      v-if="errors.password_confirmation"
                      >{{ errors.password_confirmation[0] }}</small
                    >
                  </div>

                  <div class="flex lg:flex-col flex-row mb-3">
                    <div class="w-full lg:w-6/12 pr-3">
                      <div class="relative w-full mb-3">
                        <label
                          class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                          htmlfor="grid-password"
                        >
                          Department
                        </label>
                        <select
                          class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                          v-model="form.department"
                        >
                          <option value="">Select Department</option>
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
                    <div class="w-full lg:w-6/12 pl-3">
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
                          <option value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        <small class="text-red-500" v-if="errors.gender">{{
                          errors.gender[0]
                        }}</small>
                      </div>
                    </div>
                  </div>

                  <div class="flex lg:flex-col flex-row mb-3">
                    <div class="relative w-full lg:w-6/12 pr-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlFor="grid-password"
                      >
                        Matric No
                      </label>
                      <input
                        type="text"
                        v-model="form.matric_no"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        placeholder="Matric No"
                      />
                      <small class="text-red-500 font-medium" v-if="errors.matric_no">{{
                        errors.matric_no[0]
                      }}</small>
                    </div>
                    <div class="relative w-full lg:w-6/12 pl-3">
                      <label
                        class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                        htmlFor="grid-password"
                      >
                        phone_number
                      </label>
                      <input
                        type="text"
                        v-model="form.phone_number"
                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                        placeholder="phone_number"
                      />
                      <small class="text-red-500 font-medium" v-if="errors.phone_number">{{
                        errors.phone_number[0]
                      }}</small>
                    </div>
                  </div>

                  <div>
                    <label class="inline-flex items-center cursor-pointer">
                      <input
                        id="customCheckLogin"
                        type="checkbox"
                        v-model="form.policy"
                        class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                      />
                      <span class="ml-2 text-sm font-semibold text-blueGray-600">
                        I agree with the
                        <a href="javascript:void(0)" class="text-pink-500">
                          Privacy Policy
                        </a>
                      </span>
                    </label>
                    <small class="text-red-500 font-medium" v-if="errors.policy">{{
                      errors.policy[0]
                    }}</small>
                  </div>

                  <div class="text-center mt-6">
                    <button
                      class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                      type="submit"
                    >
                      Create Account
                    </button>
                    <p class="mt-3">
                      Already have an account?
                      <router-link :to="{ name: 'login' }">click here</router-link>
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="absolute w-full bottom-0 bg-blueGray-800 pb-6">
        <div class="container mx-auto px-4">
          <hr class="mb-6 border-b-1 border-blueGray-600" />
          <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4">
              <div class="text-sm text-white font-semibold py-1 text-center md:text-left">
                Copyright © <span id="get-current-year"></span>
                <a
                  href="https://www.creative-tim.com?ref=njs-register"
                  class="text-white hover:text-blueGray-300 text-sm font-semibold py-1"
                  >Creative Tim</a
                >
              </div>
            </div>
            <div class="w-full md:w-8/12 px-4">
              <ul class="flex flex-wrap list-none md:justify-end justify-center">
                <li>
                  <a
                    href="https://www.creative-tim.com?ref=njs-register"
                    class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
                    >Creative Tim</a
                  >
                </li>
                <li>
                  <a
                    href="https://www.creative-tim.com/presentation?ref=njs-register"
                    class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
                    >About Us</a
                  >
                </li>
                <li>
                  <a
                    href="http://blog.creative-tim.com?ref=njs-register"
                    class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
                    >Blog</a
                  >
                </li>
                <li>
                  <a
                    href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-register"
                    class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
                    >MIT License</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </section>
  </main>
</template>

<script>
export default {
  name: "register",
  data() {
    return {
      departments: [],
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        policy: "",
        matric_no: "",
        phone_number: "",
        gender: "",
        department: "",
      },
      errors: {},
    };
  },

  created() {
    this.getDepartments();
  },

  methods: {
    getDepartments() {
      axios
        .get("api/v1/departments")
        .then(({ data }) => (this.departments = data))
        .catch();
    },

    signup() {
      axios
        .post("/api/auth/student-registration", this.form)
        .then((res) => {
          Toast.fire({
            icon: "success",
            title: "Registration successful.",
          });
          this.$router.push({
            name: "login",
          });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>
