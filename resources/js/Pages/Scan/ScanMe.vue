<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const points = ref('');
const SendPoints = ref('');

const onDetect = (detectedCodes) => {
    console.log(detectedCodes);
    points.value = detectedCodes[0].rawValue;
}

const onError = (error) => {
    if (error.name === 'NotAllowedError') {
        console.log('user denied camera access permission');
    } else if (error.name === 'NotFoundError') {
        // no suitable camera device installed
    } else if (error.name === 'NotSupportedError') {
        // page is not served over HTTPS (or localhost)
    } else if (error.name === 'NotReadableError') {
        // maybe camera is already in use
    } else if (error.name === 'OverconstrainedError') {
        // did you request the front camera although there is none?
    } else if (error.name === 'StreamApiNotSupportedError') {
        // browser seems to be lacking features
    }
}




</script >
  

<template>
    <AppLayout>



        <div>
            <div class="flex -mb-10 justify-center mt-6 ">
                <div>
                    <label class="block mb-2 text-sm text-center font-medium text-gray-900 dark:text-white">Point To Be
                        Send</label>
                    <input type="text" v-model="SendPoints"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter Points..." required>
                </div>
            </div>
            <section class="bg-white mx-auto my-20 rounded-3xl p-4 w-80">
                <div class="mb-6">
                    <QrcodeStream @detect="onDetect" @error="onError">
                        <b>stuff here overlays the camera stream</b>
                    </QrcodeStream>
                </div>
                <h1 class="text-2xl text-center font-bold text-dark-blue mb-3">
                    Scan Your Qr Here
                </h1>

                <p class="text-grayish-blue mb-5 leading-5"> {{ points }}</p>
            </section>

            <div class="flex justify-center -mt-10">

                <Link :href="`/Scan/${SendPoints}/${points}`" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Send {{ SendPoints }} Points
                </Link>
            </div>

        </div>
    </AppLayout>
</template>