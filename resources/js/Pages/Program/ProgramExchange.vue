<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import Profile from "@/Components/Profile.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    programs: Array,
});
</script>

<template>
    <MainLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Program Exchange
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- <div class="flex justify-end m-2 p-2">
                    <Link href="/prgexchange/create"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Create Program
                    </Link>
                </div> -->
                <div class="bg-white dark:bg-gray-800 no-scrollbar overflow-scroll  shadow-xl sm:rounded-lg" style="height: 550px;">
                    <div v-for="program in programs" :key="program.id" class="p-4">
                        <div class="flex overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                            <div class="w-1/3 bg-cover">
                                <img :src="program.imagePath" class="h-40" />
                            </div>
                            <div class="w-2/3 p-4 md:p-4">
                                <h1 class="text-xl font-bold text-gray-800 dark:text-white">{{ program.name }}</h1>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ program.description }}</p>
                                <div class="flex justify-between mt-3 item-center">
                                    <h1 class="text-lg font-bold text-gray-700 dark:text-gray-200 md:text-xl"></h1>
                                    <button
                                        class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">
                                        <Link :href="`/prgexchange/${program.id}/readmore`">
                                        Read More</Link>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
</style>
