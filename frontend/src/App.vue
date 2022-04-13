<template>

<div>
  <Nav />
  <index />
  <router-view />
</div>
  
</template>

<script>
import index from "./views/index.vue"
import Nav from "./components/navbar.vue"

export default {
  components: { index , Nav },
  name: 'App',

}
</script>

<style>

</style>
