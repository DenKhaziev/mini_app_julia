<script setup>
import axios from "axios";
import {ref} from "vue";
const activePhoto = ref(null)
const photos = ref([]);

function openPhoto(photo) {
    activePhoto.value = photo
}

function closePhoto() {
    activePhoto.value = null
}

axios.get('/api/bot-photos').then(response => {
    photos.value = response.data;
});
</script>

<template>
    <div>
        <!-- Сетка -->
        <div class="grid grid-cols-2 gap-0">
            <div
                v-for="(photo, index) in photos"
                :key="index"
                class="aspect-square overflow-hidden cursor-pointer"
                @click="openPhoto(photo)"
            >
                <img
                    :src="`/storage/${photo.image_path}`"
                    alt="work photo"
                    class="w-full h-full object-cover transition-transform duration-200"
                />
            </div>
        </div>
        <!-- Фуллскрин -->
        <transition name="fade">
            <div
                v-if="activePhoto"
                class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 cursor-zoom-out"
                @click="closePhoto"
            >
                <img
                    :src="activePhoto"
                    alt="fullscreen"
                    class="max-w-full max-h-full object-contain transition-transform duration-300 scale-100"
                />
            </div>
        </transition>
    </div>
</template>

<style scoped>

</style>
