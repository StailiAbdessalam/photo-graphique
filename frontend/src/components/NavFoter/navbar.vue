<template>
  <nav class="w-full  px-6 py-3 bg-gray-700">
    <div class="flex items-center justify-between">
      <!-- Header logo -->
      <div class="mx-3">
        <img class="h-16" src="../../assets/logo_copy.png" alt="" />
      </div>
      <!-- Mobile toggle -->
      <div class="md:hidden mx-3">
        <button @click="drawer">
          <svg class="h-8 w-8 fill-current text-white" fill="none" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>



      <div class="hidden md:block">
        <ul class="flex space-x-12 text-sm font-sans">
          <li>
            <a @click="home"
              v-bind:class="{ 'active border-b-2 text-white font-semibold  cursor-pointer border-white pb-1': url === 'home' || url === '', 'active hover:border-b-2  text-white font-semibold cursor-pointer border-white pb-1': url != 'home' }">Accueil</a>
          </li>
          <li>
            <a @click="demandes"
              v-bind:class="{ 'active border-b-2 text-white font-semibold  cursor-pointer border-white pb-1': url === 'Offre', 'active hover:border-b-2  text-white font-semibold cursor-pointer border-white pb-1': url != 'Offre' }">Post</a>
          </li>
          <div class="flex space-x-1">
            <li v-if="!isLogged" @click="login">
              <a
                class="text-md ml-2 border cursor-pointer hover:bg-white hover:text-black px-3 py-2 rounded text-white font-bold">sign
                In</a>
            </li>
            <form action="">
              <li v-if="isLogged" @click="logout">
                <a
                  class="text-md ml-2 border cursor-pointer hover:bg-white hover:text-black px-3 py-2 rounded text-white font-bold">
                  Log
                  out</a>
              </li>

            </form>
            <li v-if="!isLogged" @click="singin">
              <a
                class="text-md ml-2 bg-white border text-black hover:text-white hover:bg-gray-700 px-3 py-2 rounded font-bold cursor-pointer">Sign
                Up</a>
            </li>
          </div>
        </ul>
      </div>

      <!-- Dark Background Transition -->
      <transition enter-class="opacity-0" enter-active-class="ease-out transition-medium" enter-to-class="opacity-100"
        leave-class="opacity-100" leave-active-class="ease-out transition-medium" leave-to-class="opacity-0">
        <div @keydown.esc="isOpen = false" v-show="isOpen" class="z-10 fixed inset-0 transition-opacity">
          <div @click="isOpen = false" class="absolute inset-0 bg-black opacity-50" tabindex="0"></div>
        </div>
      </transition>

      <!-- Drawer Menu -->
      <aside
        class="p-5 transform top-0 left-0 w-64 bg-blue-700 fixed h-full overflow-auto ease-in-out transition-all duration-300 z-30"
        :class="isOpen ? 'translate-x-0' : '-translate-x-full'">
        <div class="close">
          <button class="absolute top-0 right-0 mt-4 mr-4" @click="isOpen = false">
            <svg class="w-6 h-6 text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              viewBox="0 0 24 24" stroke="currentColor">
              <path d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <ul class="font-sans text-center">
          <li class="my-5 mb-10">
            <img src="../../assets/logo_copy.png" alt="" />
          </li>
          <li class="border-b-2 rounded-t-md hover:bg-blue-500 ">
            <a href="#" @click="isOpen = false" class="block h-full w-full my-4 pt-4 text-white">Accueil</a>
          </li>
          <li class=" rounded-b-md hover:bg-blue-500">
            <a href="#" @click="isOpen = false" class="block h-full w-full mb-4 py-4 text-white">Poster</a>
          </li>
          <li>
            <a href="#" @click="isOpen = false"
              class="my-3 mt-8 w-full text-center font-semibold cta inline-block hover:bg-blue-500 px-3 py-2 border rounded text-white">Log
              In</a>
          </li>
          <li @click="singin">
            <a
              class="mb-7 w-full text-center font-semibold cta inline-block bg-white text-blue-500 hover:bg-blue-100 px-3 py-2 rounded">Sign
              Up</a>
          </li>
        </ul>
        <div class="follow">
          <p class="italic font-sans text-sm text-white">
            follow us:
          </p>
          <div class="social flex space-x-5 mt-4">
            <a href="#">
              <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter"
                class="h-5 w-5 fill-current text-white" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512">
                <path fill="currentColor"
                  d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                </path>
              </svg>
            </a>
            <a href="#">
              <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f"
                class="h-5 w-5 fill-current text-white" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 320 512">
                <path fill="currentColor"
                  d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                </path>
              </svg>
            </a>
            <a href="#">
              <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram"
                class="h-5 w-5 fill-current text-white" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512">
                <path fill="currentColor"
                  d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                </path>
              </svg>
            </a>
            <a href="#">
              <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube"
                class="h-5 w-5 fill-current text-white" role="img" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512">
                <path fill="currentColor"
                  d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                </path>
              </svg>
            </a>
          </div>
        </div>
      </aside>
    </div>
  </nav>
</template>

<script>
export default {
  name: "nav-bar",
  inject:['setLogin','isLogin'],
  data() {
    return {
      isOpen: false,
      url: "",
      token: localStorage.getItem('token'),
      isLogged:this.isLogin,
    };
  },
  methods: {
    logout() {
      localStorage.removeItem('token');
      localStorage.removeItem('id');
      this.setLogin(false);
    },
    drawer() {
      this.isOpen = !this.isOpen;
    },
    singin() {
      this.isOpen = false
      this.$router.push("/register")
      this.url = "login"
    },
    home() {
      this.$router.push("/")
      this.url = "home"

    },
    login() {
      this.$router.push("/login")
      this.url = "login"
    },
    demandes() {
      this.$router.push("/Offre")
      this.url = "Offre"
    },
    log() {
      if (localStorage.getItem("token") == null) {
        this.$router.push("/login")
        this.url = "login"
      }
      else {
        this.$router.push("/Offre")
        this.url = "Offre"
      }
    }

  },
  mounted() {
    document.addEventListener("keydown", (e) => {
      if (e.keyCode == 27 && this.isOpen) this.isOpen = false;
    })
      
  },
};
</script>