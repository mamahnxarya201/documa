<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {usePage} from "@inertiajs/vue3";
import {onMounted, ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Link } from '@inertiajs/vue3'

const page = usePage()
const user = ref()

onMounted(() => {
    user.value = page.props.auth.user
})

const props = defineProps({
    'welcome': {
        type: Object
    },
})
</script>

<template>
    <div
        class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
        <div class="flex">
            <application-logo class="block w-20 h-auto mt-9"/>
            <div class="flex-auto">
                <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                    Hello {{ user?.name }}, Welcome to Documa !
                </h1>
                <primary-button type="button" class="flex justify-start mt-2">
                    <Link href="/document">
                        Manage Document
                    </Link>
                </primary-button>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">
        <div class="flex flex-row items-center p-6 bg-white dark:bg-gray-900 rounded-lg shadow-lg">
            <svg class="w-20 h-20 text-base mr-4 fill-white dark:text-white dark:fill-black"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
            </svg>
            <div class="flex flex-col">
                <h1 class="text-5xl font-bold dark:text-white">{{ welcome.totalDocument }}</h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Total Documents</p>
            </div>
        </div>
        <div class="flex items-center p-6 bg-white dark:bg-gray-900 rounded-lg shadow-lg">
            <svg class="w-20 h-20 text-yellow-500 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
            </svg>
            <div class="flex flex-col">
                <h1 class="text-5xl font-bold dark:text-white">{{ welcome.forReview }}</h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Need Your Review</p>
            </div>
        </div>
        <div class="flex items-center p-6 bg-white dark:bg-gray-900 rounded-lg shadow-lg">
            <svg class="w-20 h-20 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12"/>
            </svg>
            <div class="flex flex-col">
                <h1 class="text-5xl font-bold dark:text-white">{{ welcome.Shared }}</h1>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Shared</p>
            </div>
        </div>
    </div>
</template>
