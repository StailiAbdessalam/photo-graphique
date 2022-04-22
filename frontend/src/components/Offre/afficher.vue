<template>
    <div
        class="flex flex-wrap gap-5 h-full bg-gradient-to-tr from-gray-300 to-gray-200 flex justify-center items-center py-20">
        <div v-for="post in posts" :key="post.id" class="md:px-4 mt-8 gap-5  space-y-4 md:space-y-0">
            <VDelete @close="DEletepop" @getAllPost="getAllPost" v-if="isDeleted" :id="id" />
            <div
                class="max-w-sm   bg-white px-6 pt-9 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
                <div class="flex gap-7 z-20 relative">
                    <h3 class="mb-3 text-xl font-bold text-indigo-600">{{ post.fullName }}</h3>
                    <div>
                        <div v-if="isLogged && post.user_id == user_id" class="group inline-block">
                            <button
                                class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                                <span class="pr-1 font-semibold flex-1">Option</span>
                                <span>
                                    <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
        transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </span>
                            </button>
                            <ul class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute 
  transition duration-150 ease-in-out origin-top min-w-32">
                                <li @click="popUpUpdate(post.id)" class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                    Modifier</li>
                                <li @click="popUpDelete(post.id)" class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                    Supprimer</li>
                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img class="w-full rounded-xl" :src="`https://firebasestorage.googleapis.com/v0/b/projet1-27e8c.appspot.com/o/images%2F${post.image}.png?alt=media&token=c373e87c-69bc-4f45-aa19-63d56ccfca23`" alt="Colors" />
                    <p
                        class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">
                        {{ post.Prix }}$</p>
                </div>
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
                        <p>{{ post.time }}</p>
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
                    <span class="mr-2" id="button-7">
                        <div id="dub-arrow">
                            <img
                                src="https://github.com/atloomer/atloomer.github.io/blob/master/img/iconmonstr-arrow-48-240.png?raw=true" />
                        </div>
                        <a>Add Post</a>
                    </span>
                </button>
            </div>
        </div>
        <div>
            <Update @close="UpdatepopUp" v-if="update" :id="id" />
            <Add @getAllPost="getAllPost" @close="fermer" v-if="close" class="form-fixed" />
            <Filter v-if="isLogged" class="filter" />
        </div>
    </div>
</template>

<script>
import Update from "./update.vue"
import axios from 'axios';
import Filter from "./Filter.vue"
import Add from "./addOffre.vue";
import VDelete from "./ValideDelete.vue";
export default {
    inject: ['setLogin', 'isLogin'],
    name: "affich-offre",
    components: {
        VDelete,
        Add,
        Filter,
        Update
    },
    data() {
        return {
            close: false,
            posts: "",
            isLogged: this.isLogin,
            isDeleted: false,
            id: null,
            update: false,
            user_id: localStorage.getItem('id')
        }
    },
    methods: {
        setId(id) {
            console.log(this.id)
            this.id = id;
        },
        popUpDelete(id) {
            this.isDeleted = true
            this.id = id;
        },
        popUpUpdate(id) {
            this.update = true;
            this.id = id;
        },
        affich() {
            this.close = true;
        },
        fermer() {
            this.close = false;
        },
        UpdatepopUp(isUpdate) {
            this.update = isUpdate;
        },
        DEletepop(isDeleted) {
            this.isDeleted = isDeleted
        },
        getAllPost() {
            axios.get("http://127.0.0.1:8000/api/getAllPost").then(res => {
                this.posts = res.data.reverse();
            });
        },
        deletePost(ev) {
            console.log(this.id);
            axios.delete(`http://127.0.0.1:8000/api/deletPost/${this.id}`)
                .then(res => {
                    console.log(res);
                    this.$emit("getAllPost");
                    this.close();
                })
                .catch(err => {
                    console.log(err)
                })
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

#button-7 {
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

#button-7 a {
    position: relative;
    left: 0;
    transition: all .25s ease-Out;
}

#dub-arrow {
    width: 100%;
    height: 100%;

    left: -200px;
    position: absolute;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .25s ease-Out;
    bottom: 0;
}

#button-7 img {
    width: 20px;
    height: auto;
}

#button-7:hover #dub-arrow {
    left: 0;
}

#button-7:hover a {
    left: 150px;
}

@media screen and (min-width:1000px) {
    h1 {
        font-size: 2.2em;
    }

    #container {
        width: 50%;
    }
}



li>ul {
    transform: translatex(100%) scale(0)
}

li:hover>ul {
    transform: translatex(101%) scale(1)
}

li>button svg {
    transform: rotate(-90deg)
}

li:hover>button svg {
    transform: rotate(-270deg)
}

.group:hover .group-hover\:scale-100 {
    transform: scale(1)
}

.group:hover .group-hover\:-rotate-180 {
    transform: rotate(180deg)
}

.scale-0 {
    transform: scale(0)
}

.min-w-32 {
    min-width: 8rem
}

.form-fixed {
    position: fixed;
    top: -10%;
    left: 0%;

}
</style>