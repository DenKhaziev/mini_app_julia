
<script setup>
import {ref} from "vue";

const photos = [
    '/storage/works/photo.png',
    '/storage/works/photo1.png',
    '/storage/works/photo2.png',
    '/storage/works/photo3.png',
    '/storage/works/photo4.png',
    '/storage/works/photo5.png',
    '/storage/works/photo6.png',
    '/storage/works/photo7.png',
    '/storage/works/photo8.png',
    '/storage/works/photo.png',
    '/storage/works/photo1.png',
    '/storage/works/photo2.png',
    '/storage/works/photo3.png',
    '/storage/works/photo4.png',
    '/storage/works/photo5.png',
    '/storage/works/photo6.png',
    '/storage/works/photo7.png',
    '/storage/works/photo8.png',
]
const activePhoto = ref(null)

function openPhoto(photo) {
    activePhoto.value = photo
}

function closePhoto() {
    activePhoto.value = null
}
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
                    :src="photo"
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
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>

