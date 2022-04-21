import { createApp } from "vue";
import router from "./router/index";
import App from "./App.vue";
import Vue3Lottie from "vue3-lottie";
import "./index.css";


import * as firebase from "firebase/app";
import "firebase/storage"
// import "firebase/firestore"
import "firebase/auth"

export const firebaseConfig = {
    apiKey: "AIzaSyCxmcDKSjysiBrACmr13wTmJ8WH2msekVc",
    authDomain: "projet1-27e8c.firebaseapp.com",
    projectId: "projet1-27e8c",
    storageBucket: "projet1-27e8c.appspot.com",
    messagingSenderId: "739532038732",
    appId: "1:739532038732:web:e9bcb08ef6886799464ae9",
    measurementId: "G-K1LDMLET2Z"
  };

firebase.initializeApp(firebaseConfig);



createApp(App).use(router).use(Vue3Lottie).mount("#app");
