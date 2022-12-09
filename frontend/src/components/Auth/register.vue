<template>
    <div>
        <div class="flex items-center min-h-screen bg-white dark:bg-gray-900">
            <div class="container mx-auto mt-auto">
                <Erour :message="newUser.email" v-if="valide === false" />
                <div class="max-w-md mx-auto my-10">
                    <div class="text-center">
                        <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Sign up</h1>
                        <p class="text-gray-500 dark:text-gray-400">Sign up to access your account</p>
                    </div>
                    <div class="m-7">

                        <form method="post" action="" @submit.prevent="AddUser">
                            <div class="mb-6">
                                <label for="fullname" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Full
                                    name
                                </label>
                                <input type="text" v-model="newUser.fullName" name="fullname" id="email" required
                                    placeholder="entrer your name"
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                                <!-- alert for the input  -->
                            </div>

                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email
                                    Address</label>
                                <input type="email" v-model="newUser.email" name="email" id="email" required
                                    placeholder="you@company.com"
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />

                            </div>

                            <div class="mb-6">
                                <label for="number" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">your
                                    phone</label>
                                <input type="number" v-model="newUser.phone" name="number" id="email" required
                                    placeholder="+212 000000000"
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />

                            </div>
                            <div class="mb-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password"
                                        class="text-sm text-gray-600 dark:text-gray-400">Password</label>
                                    <a href="#!"
                                        class="text-sm text-gray-400  focus:outline-none focus:text-indigo-500 hover:text-indigo-500 dark:hover:text-indigo-300">Forgot
                                        password?</a>
                                </div>
                                <input type="password" v-model="newUser.password" name="password" id="password"
                                    placeholder="Your Password" required
                                    class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                            </div>
                            <div class="mb-6">
                                <button type="submit"
                                    class="w-full px-3 py-4 text-white bg-gray-700 rounded-md focus:bg-black focus:outline-none">Sign
                                    up</button>
                            </div>
                            <p class="text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a
                                    @click="login"
                                    class="text-indigo-400 focus:outline-none cursor-pointer focus:underline focus:text-black dark:focus:border-indigo-800">Sign
                                    in</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import axios from "axios";
import Erour from "../erour/erourinput.vue";

export default {
    name: 'sing-in',
    components: {
        Erour,
    },
    data() {
        return {
            newUser: {
                fullName: '',
                email: '',
                phone: '',
                password: '',
            },
            valide: true,

        }
    },
    methods: {
        login() {
            this.$router.push("/login")
        },
        AddUser() {
            axios.post('http://127.0.0.1:8000/api/Authantification', {
                fullName: this.newUser.fullName,
                email: this.newUser.email,
                phone: this.newUser.phone,
                password: this.newUser.password
            })
                .then(res => {
                    if (res.data === true) {
                        this.$router.push("/login");
                    }
                    else {
                        this.valide = false;
                    }
                })
        }
    },
}
</script>