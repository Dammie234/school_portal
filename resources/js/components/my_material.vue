<template>
  <div>
    <sidebar active="student-courses"></sidebar>
    <div class="relative md:ml-64 bg-blueGray-50">
      <top-nav page_title="My Materials"></top-nav>
      <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12"></div>
      <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="w-full px-4">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
          >
            <div class="rounded-t bg-white mb-0 px-6 py-6">
              <div class="text-center flex justify-between">
                <h6 class="text-blueGray-700 text-xl font-bold">
                  {{ data.course.course_title }} Materials
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
              <div class="block w-full overflow-x-auto">
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
                        Content
                      </th>
                      <th
                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                      >
                        Video
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="mat in data.materials" :key="mat.id">
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        {{ mat.title }}
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        <span v-if="mat.content"
                          ><a :href="mat.content" target="_blank">View Material</a></span
                        ><span v-else>Not Available</span>
                      </td>
                      <td
                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                      >
                        <a :href="mat.video" target="_blank" v-if="mat.video"
                          >Access Video</a
                        >
                        <span v-else>Not Available</span>
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
      data: {},
    };
  },
  created() {
    this.login();
    this.getMaterials();
  },
  methods: {
    login() {
      if (!User.loggedIn()) {
        this.$router.push({
          name: "login",
        });
      }
    },
    getMaterials() {
      let course_id = this.$route.params.course_id;
      axios
        .get("/api/v1/my-materials/" + course_id)
        .then(({ data }) => (this.data = data))
        .catch();
    },
  },
};
</script>
