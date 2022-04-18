<template>

<div>
  <Nav />
  <router-view />
  <!-- <LottieAnimation/> -->
  <Footer />
</div>
  
</template>

<script>

import Nav from "./components/NavFoter/navbar.vue"
import Footer from "./components/NavFoter/footer.vue"
import { computed } from "@vue/reactivity"

export default {
  components: {  Nav, Footer },
  name: 'App',
  data() {
    return {
            isLogin: false,
    }
  },
  methods: {
     setLogin(login) {
      this.isLogin = login
    },
  },
    provide() {
    return {
      isLogin: computed(() => this.isLogin),
      setLogin: this.setLogin

    }
  },
  mounted() {
    this.isLogin = !!localStorage.getItem("token")
  },

}
</script>

<style>

</style>
