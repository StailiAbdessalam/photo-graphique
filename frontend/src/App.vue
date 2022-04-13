<template>

<div>
  <Nav />
  <index />
  <router-view />
  <Footer />
</div>
  
</template>

<script>
import index from "./views/index.vue"
import Nav from "./components/navbar.vue"
import Footer from "./components/footer.vue"

export default {
  components: { index , Nav, Footer },
  name: 'App',

}
</script>

<style>

</style>
