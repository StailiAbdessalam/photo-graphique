<template>
    <div>
        <div class=" bg-opacity-70 bg-black w-screen ">
            <section id="login" class="p-4 flex flex-col justify-center min-h-screen max-w-md mx-auto">
                <div class="p-6 bg-gray-700 rounded">
                    <div class="flex items-center justify-center font-black m-3 mb-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-3 text-red-600 animate-pulse"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                clip-rule="evenodd" />
                        </svg>
                        <h1 class="tracking-wide text-3xl text-white">POSTER</h1>
                        <div @click="$emit('close', false)" class="m-3">
                            <button
                                class="bg-red-500 text-white font-bold rounded border-b-2 border-red-500 hover:border-red-600 hover:bg-white hover:text-black shadow-md py-2 px-6 inline-flex items-center">
                                <span class="mr-2">close</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentcolor"
                                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                                </svg>
                            </button>
                        </div>

                    </div>
                    <form id="login_form" @submit.prevent="" @click="subsub" enctype="multipart/form-data" method="POST"
                        class="flex flex-col justify-center">
                        <label class=" m-2 text-white font-medium">image</label>
                        <div class="container mx-auto h-full flex flex-col justify-center items-center">
                            <input @change="uploadImage" type="file" accept=".png,.jpg,.jpeg"
                                :maxFileSize="1048576000000" id="multi-upload-input" multiple />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <label class=" m-2 block text-white font-medium text-gray-700">Type</label>
                            <select @change="typefun" v-model="newPost.Type" id="vehicle_id" name="vehicle_id"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <!-- <option >-- select Type no --</option> -->
                                <option value="Offre" data-val="1">Offre</option>
                                <option value="demande" data-val="2">demande</option>
                            </select>
                        </div>
                        <label v-if="offre" class=" m-2 block text-white font-medium text-gray-700">entrer your
                            Prix</label>
                        <div v-if="offre" class="flex justify-between items-center mb-3">
                            <div class="inline-flex items-center self-start">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-8 w-8 mr-3 bg-gradient-to-r from-pink-600 to-red-600 shadow-lg rounded p-1.5 text-gray-100"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13 7H7v6h6V7z" />
                                    <path fill-rule="evenodd"
                                        d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2zM5 5h10v10H5V5z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="font-bold text-gray-900">$dollar / Prix</span>
                            </div>
                            <div class="flex">
                                <button type="button" @click="minus()" class="bg-yellow-600 p-1.5 font-bold rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <input v-model="newPost.Prix" id="item_count" type="number" class="max-w-[100px] font-bold font-mono py-1.5 px-2 mx-1.5
            block border border-gray-300 rounded-md text-sm shadow-sm  placeholder-gray-400
            focus:outline-none
            focus:border-sky-500
            focus:ring-1
            focus:ring-sky-500
            focus:invalid:border-red-500  focus:invalid:ring-red-500">
                                <button type="button" @click="plus()" class="bg-green-600 p-1.5 font-bold rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <label class="text-white font-medium">title</label>
                        <input v-model="newPost.Title" class="mb-3 px-2 py-1.5
          mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
          focus:outline-none
          focus:border-sky-500
          focus:ring-1
          focus:ring-sky-500
          focus:invalid:border-red-500 focus:invalid:ring-red-500" type="text" name="username" placeholder="wahyusa">
                        <label class="text-white font-medium">description</label>
                        <textarea v-model="newPost.description" class="
          mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
          focus:outline-none
          focus:border-sky-500
          focus:ring-1
          focus:ring-sky-500
          focus:invalid:border-red-500 focus:invalid:ring-red-500" name="messages"
                            placeholder="Write something"></textarea>
                        <input @click="sendImage" id="login_process_state"
                            class="px-4 py-1.5 hover:cursor-pointer rounded-md shadow-lg bg-gradient-to-r from-pink-600 to-red-600 font-medium text-gray-100 block transition duration-300"
                            type="submit" value="Sending :)">
                    </form>
                </div>
            </section>
        </div>
    </div>
</template>



<script>
import axios from "axios";
import * as fireStorage from "firebase/storage";
//  import {firebaseConfig} from "../../main";

export default {
    name: "add-item",
    methods: {
        uploadImage(e) {
            this.imageName = e.target.files[0];
        },
        plus() {
            let count = parseInt(document.getElementById('item_count').value);
            document.getElementById('item_count').value = count + 1;
            this.subtotal = count + 1;
        },
        minus() {
            let count = parseInt(document.getElementById('item_count').value);
            if (count > 1) {
                document.getElementById('item_count').value = count - 1;
                this.subtotal = count - 1;
            }
        },
        typefun() {
            document.getElementById("vehicle_id").value == "Offre" ? this.offre = true : this.offre = false
        },
        sendImage() {
            let file = this.imageName;
            let newname = Math.random().toString(36).slice(2) + new Date().getTime().toString(36);
            let storageRef = fireStorage.ref(fireStorage.getStorage(), "images/" + newname+".png");
            fireStorage.uploadBytes(storageRef, file).then(function () {
                console.log(newname);
            });
            axios.post("http://127.0.0.1:8000/api/AddPost", {
                user_id: this.newPost.user_id,
                Title: this.newPost.Title,
                image: newname,
                Prix: this.newPost.Prix,
                Type: this.newPost.Type,
                description: this.newPost.description,
            }).then(response => {
                console.log(response);
                this.$emit('close', false);
                
            }).catch(error => {
                console.log(error);
            });
        },
    },

// 
    data() {
        return {
            newPost: {
                user_id: localStorage.getItem("id"),
                Prix: 0,
                Title: '',
                image: '',
                Type: '',
            },
            offre: false,
            imageName: '',
        }
    },



}





</script>