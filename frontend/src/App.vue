<template>

<div>
  <Nav />
  <router-view />
  <!-- <LottieAnimation/> -->
  <Footer />
</div>
  
</template>

<script>

import Nav from "./components/navbar.vue"
import Footer from "./components/footer.vue"

export default {
  components: {  Nav, Footer },
  name: 'App',

}
</script>

<style>

</style>
