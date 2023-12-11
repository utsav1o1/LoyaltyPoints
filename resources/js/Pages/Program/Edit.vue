<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import { Link, useForm, router } from "@inertiajs/vue3";
import { reactive } from "vue";



export default {
    components: {
        Link,
        Welcome,
        AppLayout,
    },
    setup(props) {
        console.log('props.programs:', props.programs);

        const formData = reactive({
            title: props.program.name,
            description: props.program.description,
            image: null,
        });

        function submit() {
            router.post("/prgexchange", formData);
        }

        return {
            formData,
            submit,
        };
    },
};
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
                <div class="flex m-2 p-2">
                    <Link href="/prgexchange"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Back</Link>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit"
                        class="w-full max-w-md mx-auto bg-white rounded-lg shadow-md px-5 py-7 m-9">
                        <h2 class="text-xl font-bold mb-4">
                            Edit Program
                        </h2>

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                            <input type="text" required v-model="formData.title" placeholder="Enter title here" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                            <textarea id="description" type="text" required name="description"
                                v-model="formData.description" placeholder="Enter description here" rows="5"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>
                        <div class="mb-4">
                            <img :src="image" class="w-32 h-32" alt="">
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="file" required @input="formData.image = $event.target.files[0]" />
                            <progress v-if="formData.progress" :value="formData.progress.percentage" max="100">
                                {{ formData.progress.percentage }}%
                            </progress>
                        </div>

                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
