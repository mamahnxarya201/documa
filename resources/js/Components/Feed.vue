<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { DocumentTextIcon} from "@heroicons/vue/24/outline/index.js";

const props = defineProps({
    'feed': {
        type: Object
    }
})
</script>

<template>
    <div>
        <div
            class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
            <div>
                <h1 class="text-5xl font-medium text-gray-900 dark:text-white">
                    Activity Feed
                </h1>
                <h1 class="py-2 text-lg dark:text-white">
                    Here's what your team has been up to!
                </h1>
                <primary-button  href="/log" class="mt-2">
                    Show All
                </primary-button>
            </div>
        </div>

        <div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Latest Activity</h3>
                <div class="space-y-4">
                    <div v-for="activity in feed.activity" :key="activity.id" class="flex items-end space-x-4">
                        <div class="flex flex-col">
                            <p class="text-gray-800 dark:text-gray-200">{{ activity.name }} {{ activity.desc }}</p>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">{{activity.approx}}</p>
                        </div>
                        <div class="flex-auto text-end">
                            <p class="text-gray-500 dark:text-gray-400 text-sm ml-2 ">{{ activity.date }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Latest Documents</h3>
                <div class="space-y-4">
                    <div v-for="document in feed.document" :key="document.id" class="flex items-end space-x-4">
                        <div class="pb-1">
                            <DocumentTextIcon class="h-8 w-8 dark:text-white"/>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-gray-800 dark:text-gray-200">{{document.name}}</p>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">{{ document.approx }}</p>
                        </div>
                        <div class="flex-auto text-end">
                            <p class="text-gray-500 dark:text-gray-400 text-sm ml-2 ">{{ document.date }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
