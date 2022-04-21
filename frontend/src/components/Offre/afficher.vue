<template>
    <div
        class="flex flex-wrap gap-5 h-full bg-gradient-to-tr from-gray-300 to-gray-200 flex justify-center items-center py-20">
        <div v-for="post in posts" id="haaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa" :key="post.id"
            class="md:px-4 mt-8 gap-5  space-y-4 md:space-y-0">
            <VDelete class="" v-if="isDeleted" :id="id" />
            <div
                class="max-w-sm   bg-white px-6 pt-9 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
                <!-- nom de client qui post cette post -->
                <div class="flex gap-7 z-20 relative">
                    <h3 class="mb-3 text-xl font-bold text-indigo-600">Abdessalam Staili</h3>
                    <Option @close="fermer" @getAllPost="getAllPost" :id="post.id" :set-id="setId" />
                </div>
                <div class="relative">
                    <!-- image de chause qui post -->
                    <img class="w-full rounded-xl" src="../../assets/back.png" alt="Colors" />
                    <!-- prix de site pieces -->
                    <p
                        class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">
                        {{ post.Prix }}$</p>
                </div>
                <!-- description -->
                <h4 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">{{ post.Title }}: <br> <span
                        class="font-normal">{{ post.description }}</span> </h4>
                <div class="my-4">
                    <div class="flex space-x-1 items-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <!-- time de post -->
                        <p>1:34:23 Minutes</p>
                    </div>
                    <div class="flex space-x-1 items-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <p>{{ post.Type }}</p>
                    </div>
                    <button class="mt-4 text-xl w-full text-white bg-gray-600 py-2 rounded-xl shadow-lg">Buy
                        Lesson</button>
                </div>
            </div>
        </div>
        <div @click="affich" v-if="isLogged" class="fixed right-1 top-20">
            <div class="m-3">
                <button
                    class="bg-green-500 text-white font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-white hover:text-black shadow-md py-2 px-6 inline-flex items-center">
                    <span class="mr-2">Add Post</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div>
            <Add @getAllPost="getAllPost" @close="fermer" v-if="close" class="form-fixed" />
            <Filter v-if="isLogged" class="filter" />
        </div>
    </div>
</template>

<script>
import Option from './option.vue';
import axios from 'axios';
import Filter from "./Filter.vue"
import Add from "./addOffre.vue";
import VDelete from "./ValideDelete.vue";
import { computed } from "@vue/reactivity";

export default {
    inject: ['setLogin', 'isLogin', 'setDelete', 'isDeleted'],

    name: "affich-offre",
    components: {
        VDelete,
        Add,
        Filter,
        Option,
    },
    provide() {
        return {
            isDeleted: computed(() => this.isDeleted),
            setDelete: this.setDelete,
        }
    },
    data() {
        return {
            deletePost: false,
            close: false,
            posts: "",
            isLogged: this.isLogin,
            isDeleted: false,
            id:null
        }
    },
    methods: {
        setId(id) {
            console.log(this.id)
            this.id = id;
        },
        setDelete(isDeleted) {
            this.isDeleted = isDeleted

        },
        affich() {
            this.close = true;
        },
        fermer() {
            this.close = false;

        },

        getAllPost() {
            axios.get("http://127.0.0.1:8000/api/getAllPost").then(res => {
                this.posts = res.data.reverse();
                console.log(this.posts);
            });
        },
    },
    mounted() {
        this.getAllPost();
    },
}
</script>

<style scoped>
.form-fixed {
    position: fixed;
    top: 0%;
    left: 0%;
}

.filter {
    position: fixed;
    right: 17px;
    top: 125px;
}
</style>