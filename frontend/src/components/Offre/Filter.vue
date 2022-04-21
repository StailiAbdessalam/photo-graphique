<template>
    <div>
        <div class="my-2  flex sm:flex-row flex-col">
            <div class="flex  flex-row mb-1 sm:mb-0">

                <div class="relative">
                    <select
                        class="appearance-none h-full rounded-r  border-t sm:rounded-r-none sm:border-r-0 border-r rounded-md border-b block appearance-none w-full bg-yellow-400 border-gray-400 text-black py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                        <option>All</option>
                        <option>Offre</option>
                        <option>demande</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>


    </div>
</template>

<script>
export default {
    name: "filter-ter",
    data() {
        return {

        }
    },

}
</script>

<style lang="scss" scoped>
</style>