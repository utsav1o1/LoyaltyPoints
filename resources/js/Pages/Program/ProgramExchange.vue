<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import Profile from "@/Components/Profile.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    programs: Array,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Program Exchange
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link href="/prgexchange/create"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Create Program
                    </Link>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-for="program in programs" :key="program.id">
                        <div class="flex flex-col flex-initial m-3">
                            <div
                                class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
                                <div class="w-full md:w-1/3 bg-white grid place-items-center">
                                    <img :src="program.imagePath" alt="tailwind logo" class="rounded-xl" />
                                </div>
                                <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                                    <div class="flex justify-between item-center">
                                        <p class="text-red-600 font-medium md:block">
                                            GoldStar
                                        </p>

                                        <!-- <div class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800  md:block">
                            Superhost</div> -->
                                    </div>
                                    <h3 class="font-black text-gray-800 md:text-3xl text-xl">
                                        {{ program.name }}
                                    </h3>
                                    <p class="md:text-lg text-gray-500 text-base">
                                        {{ program.description }}
                                    </p>
                                    <p class="text-xl font-black text-gray-800">
                                        <Link :href="`/prgexchange/${program.id}/readmore`"
                                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                        Read More</Link>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
