<template>
    <div>
        
    </div>
</template>
<script>
   export default {
    name: 'logout',
    
    created() {
      this.login()  
    },
    methods: {
        login(){
            axios.post('/api/auth/logout')
            .then()
            .catch()
            localStorage.removeItem('token')
            Toast.fire({
                icon: 'success',
                title: 'Logout successfully'
            })
            this.$router.push({
                name: 'login'
            })
           
        }
    }
   }
    
</script>