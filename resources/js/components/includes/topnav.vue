<template>
  <div>
    <nav
      class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
    >
      <div
        class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
      >
        <a
          class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
          href="./index.html"
          >{{ page_title }}</a
        >
        <div class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3">
          <div class="relative flex w-full flex-wrap items-stretch">Hello {{ name }}</div>
        </div>
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
          <a
            class="text-blueGray-500 block"
            href="#pablo"
            onclick="openDropdown(event,'user-dropdown')"
          >
            <div class="items-center flex">
              <span
                class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
                ><img
                  alt="..."
                  class="w-full rounded-full align-middle border-none shadow-lg"
                  src="assets/img/team-1-800x800.jpg"
              /></span>
            </div>
          </a>
          <div
            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
            id="user-dropdown"
          >
            <a
              href="#pablo"
              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
              >Action</a
            ><a
              href="#pablo"
              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
              >Another action</a
            ><a
              href="#pablo"
              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
              >Something else here</a
            >
            <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
            <router-link
              :to="{ name: 'logout' }"
              class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
              >Logout</router-link
            >
          </div>
        </ul>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  name: "top-nav",
  props: ["page_title"],
  data() {
    return {
      id: "",
      name: "",
    };
  },
  created() {
    this.login();
  },
  methods: {
    login() {
      if (User.loggedIn()) {
        this.id = User.id();
        this.name = User.name();
      }
    },
  },
};
</script>
