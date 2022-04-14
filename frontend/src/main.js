

import { createApp } from 'vue'
import router from './router/index';
import App from './App.vue'
import Vue3Lottie from 'vue3-lottie'

createApp(App).use(router).use(Vue3Lottie).mount('#app')
