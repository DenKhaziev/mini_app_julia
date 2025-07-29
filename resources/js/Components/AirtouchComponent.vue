<script setup>
import axios from "axios";
import {onMounted, ref} from "vue";
import {useRevealOnScroll} from "../composables/useRevealOnScroll.js";
const photos = ref([])
const activePhoto = ref(null)

function openPhoto(photo) {
    activePhoto.value = photo
}
function closePhoto() {
    activePhoto.value = null
}

onMounted(() => {
    axios.get('/api/bot-photos', {
        params: {
            category: 'color'
        }
    }).then(response => {
        photos.value = response.data
    })
})
const { revealedIndexes } = useRevealOnScroll(photos)
</script>

<template>
    <div>
        <h2>Сложные окрашивания</h2>
        <!-- Сетка -->
        <div class="grid grid-cols-2 gap-0">
            <div
                v-for="(photo, index) in photos"
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
        <!-- Фуллскрин -->
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
