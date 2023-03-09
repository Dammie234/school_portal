require('./bootstrap')

import Vue from 'vue'
import VueRouter from 'vue-router'
import {routes} from './routes'
import Swal from 'sweetalert2'
import User from './helpers/user'

import Sidebar from './components/includes/sidebar.vue'
import TopNav from './components/includes/topnav.vue'


Vue.component('sidebar', Sidebar)
Vue.component('top-nav', TopNav)
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});


window.Toast = Toast;
window.Swal = Swal
window.User = User
window.Reload = new Vue()



Vue.use(VueRouter)


const router = new VueRouter({
    routes,
    mode: 'history'
  })
  

const app = new Vue({
    el: '#app',
    router
});