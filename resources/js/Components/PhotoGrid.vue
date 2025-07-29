<script setup>
import { useRevealOnScroll } from '@/composables/useRevealOnScroll'
import {onMounted, ref} from 'vue'
import axios from "axios";

const props = defineProps({
    photos: Array
})
// const photos = ref([])
const activePhoto = ref(null)

function openPhoto(photo) {
    activePhoto.value = photo
}
function closePhoto() {
    activePhoto.value = null
}

// onMounted(() => {
//     axios.get('/api/bot-photos').then(response => {
//         photos.value = response.data
//     })
// })
const photos = ref(props.photos)
const { revealedIndexes } = useRevealOnScroll(props.photos)
console.log(photos)
</script>

<template>
    <div>
        <div
            v-if="props.photos.length"
            class="grid grid-cols-2 gap-0"
        >
            <div
                v-for="(photo, index) in props.photos"
                :key="index"
                :data-index="index"
                class="reveal-section aspect-square overflow-hidden cursor-pointer animate-fade-in-up"
                :class="{ 'entered': revealedIndexes.includes(index) }"
                @click="openPhoto(photo)"
            >
                <img
                    :src="`/storage/${photo.image_path}`"
                    alt="work photo"
                    class="w-full h-full object-cover transition-transform duration-200"
                />
            </div>
        </div>

        <transition name="fade">
            <div
                v-if="activePhoto"
                class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 cursor-zoom-out"
                @click="closePhoto"
            >
                <img
                    :src="`/storage/${activePhoto.image_path}`"
                    alt="fullscreen"
                    class="max-w-full max-h-full object-contain transition-transform duration-300 scale-100"
                />
            </div>
        </transition>
    </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
.animate-fade-in-up {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.7s ease-out;
}
.animate-fade-in-up.entered {
    opacity: 1;
    transform: translateY(0);
}
</style>
