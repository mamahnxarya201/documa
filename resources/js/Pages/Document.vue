<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import {ChevronDownIcon} from "@heroicons/vue/24/solid/index.js";
import {ref} from "vue";

const openDropdown = ref(false)
const items = ref([{id: 1, name: 'test', openDropdown: false}])

function dropDown() {
    console.log("aokwkwa")
    openDropdown.value = !openDropdown.value
}

</script>

<template>
    <AppLayout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <div id="app" class="container mx-auto">
                                        <div class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <div class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 p-3">
                                                <div class="grid grid-cols-5 gap-4">
                                                    <div class="px-6 py-3">Name</div>
                                                    <div class="px-6 py-3">Status</div>
                                                    <div class="px-6 py-3">Tags</div>
                                                    <div class="px-6 py-3">Action</div>
                                                    <div class="px-6 py-3">Detail</div>
                                                </div>
                                            </div>
                                            <div v-for="item in items" :key="item.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <div class="grid grid-cols-5 gap-5 ml-2 items-center px-8 py-4">
                                                    <div class="font-medium text-gray-900 dark:text-white whitespace-nowrap flex">
                                                        test gfdsgsdsl
                                                    </div>
                                                    <div class="font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                        test
                                                    </div>
                                                    <div class="font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                        test
                                                    </div>
                                                    <div class="flex gap-2">
                                                        <a href="/document" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                                            </svg>
                                                        </a>
                                                        <a href="/document" class="font-medium text-blue-600 dark:text-blue-500 hover:text-gray-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <button @click="item.openDropdown = !item.openDropdown">
                                                            <ChevronDownIcon class="text-blue-600 dark:text-blue-500 h-8 w-8" />
                                                        </button>
                                                    </div>
                                                </div>
                                                <div v-if="item.openDropdown" class="p-4 dark:bg-gray-800 dark:text-white">
                                                    <div class="grid grid-cols-3 gap-y-8 gap-x-4">
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Name</div>
                                                            <div class="text-base">Supersemar</div>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Author</div>
                                                            <div class="text-base">Hertod</div>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Status</div>
                                                            <div class="text-base">Live</div>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Total Files</div>
                                                            <div class="text-base">10</div>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Shared To</div>
                                                            <div class="text-base">Group A, Group B, Group C</div>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Tags</div>
                                                            <div class="text-base">Urgent, Base</div>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Created At</div>
                                                            <div class="text-base">Urgent, Base</div>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Published At</div>
                                                            <div class="text-base">Urgent, Base</div>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Last Update</div>
                                                            <div class="text-base">Urgent, Base</div>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div class="text-xl text-gray-400">Reviewed By</div>
                                                            <div class="text-base">Urgent, Base</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
