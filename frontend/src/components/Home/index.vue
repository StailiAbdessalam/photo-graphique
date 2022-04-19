<template>

    <div class="home">
        <div class="w-full h-full  ">
            <div class="flex bg-gradient-to-tr from-gray-300 to-gray-200" style="height:630px;">
                <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                    <div>
                        <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">Acheté tout les materiales de <span
                                class="text-indigo-600">photographier</span></h2>
                        <p class="mt-2 text-sm text-gray-500 md:text-base">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Blanditiis commodi cum cupiditate ducimus, fugit harum id
                            necessitatibus odio quam quasi, quibusdam rem tempora voluptates. Cumque debitis
                            dignissimos id quam vel! adipisicing elit. Blanditiis commodi cum cupiditate ducimus, fugit
                            harum id
                            necessitatibus odio quam quasi, quibusdam rem tempora voluptates. Cumque debitis
                            dignissimos id quam vel! adipisicing elit. Blanditiis commodi cum cupiditate ducimus, fugit
                            harum id
                            necessitatibus odio quam quasi, quibusdam rem tempora voluptates. Cumque debitis
                            dignissimos id quam vel!</p>
                        <div class="flex justify-center lg:justify-start mt-6">
                            <a class="px-10 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800"
                                href="#">Get Started</a>
                            <a class="mx-5 px-10 py-3 bg-white text-gray-900 text-xs font-semibold rounded hover:bg-gray-400"
                                href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                    <div id="top" class="h-full object-cover">
                        <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_hymrcjeq.json"
                            background="transparent" speed="1" style="width: 470px; height: 470px; " loop autoplay>
                        </lottie-player>
                        <div class="h-full bg-black opacity-25"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script >



export default {
    name: "index-h",
    components: {
    }
}
</script>


<style>
.home {
    background-size: cover;
    padding-top: 87px;
}

#top {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>