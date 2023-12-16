<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    program: Array,
});
</script>

<template>
   

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex m-2 p-2">
                    <Link
                        href="/prgexchange"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded"
                        >Back</Link
                    >
                </div>
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div
                        class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12"
                    >
                        <div
                            class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10"
                        >
                            <div class="mx-auto max-w-md">
                                <img
                                    :src="program.imagePath"
                                    class="h-6"
                                    alt="Tailwind Play"
                                />
                                <div class="divide-y divide-gray-300/50">
                                    <div
                                        class="space-y-6 py-8 text-base leading-7 text-gray-600"
                                    >
                                    <h2 class="text-xl font-bold mb-2">{{program.name}}</h2>

                                        <p>
                                           {{program.description}}
                                        </p>
                                    </div>
                                    <div
                                        class="pt-8 text-base font-semibold leading-7"
                                    >
                                    <Link :href="`/prgexchange/${program.id}/edit`"
                                            class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                        Edit</Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
