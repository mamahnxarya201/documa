<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Feed from "@/Components/Feed.vue";

const props = defineProps({
    payload: {
        type:Object
    },
})
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome :welcome="payload.welcome" />
                </div>
            </div>
        </div>

        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <Feed :feed="payload.feed" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
