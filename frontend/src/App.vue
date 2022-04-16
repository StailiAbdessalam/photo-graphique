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

export default {
  components: {  Nav, Footer },
  name: 'App',

}
</script>

<style>

</style>
