<template>
        <div class="h-full bg-gradient-to-tr from-gray-300 to-gray-200 flex justify-center items-center py-20">
            <div class="md:px-4 md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 space-y-4 md:space-y-0">
                <div
                    class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
                    <!-- nom de client qui post cette post -->
                    <h3 class="mb-3 text-xl font-bold text-indigo-600">Abdessalam Staili</h3>
                    <div class="relative">
                        <!-- image de chause qui post -->
                        <img class="w-full rounded-xl" src="../../assets/back.png" alt="Colors" />
                        <!-- prix de site pieces -->
                        <p
                            class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">
                            $0</p>
                    </div>
                    <!-- description -->
                    <h4 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">cette camera et tres bonne qualiter
                        60px</h4>
                    <div class="my-4">
                        <div class="flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <!-- time de post -->
                            <p>1:34:23 Minutes</p>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <!-- type demande or offre -->
                            <p>Offre</p>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </span>
                            <p>nouveau</p>
                        </div>
                        <button class="mt-4 text-xl w-full text-white bg-gray-600 py-2 rounded-xl shadow-lg">Buy
                            Lesson</button>
                    </div>
                </div>
                <div
                    class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
                    <h3 class="mb-3 text-xl font-bold text-indigo-600">Beginner Friendly</h3>
                    <div class="relative">
                        <img class="w-full rounded-xl"
                            src="https://images.unsplash.com/photo-1561835491-ed2567d96913?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80"
                            alt="Colors" />
                        <p
                            class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">
                            $50</p>
                    </div>
                    <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">Advanced React Native for
                        Sustainability</h1>
                    <div class="my-4">
                        <div class="flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                            <p>1:34:23 Minutes</p>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <p>3 Parts</p>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </span>
                            <p>Vanilla JS</p>
                        </div>
                        <button class="mt-4 text-xl w-full text-white bg-gray-600 py-2 rounded-xl shadow-lg">Buy
                            Lesson</button>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
name:"affich-offre"
}
</script>

<style lang="scss" scoped>
</style>