
<script setup>
import {onMounted, ref} from "vue";

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
const revealedSections = ref([])
function openPhoto(photo) {
    activePhoto.value = photo
}

function closePhoto() {
    activePhoto.value = null
}

function markRevealed(index) {
    if (!revealedSections.value.includes(index)) {
        revealedSections.value.push(index)
    }
}

onMounted(() => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const index = Number(entry.target.dataset.index)
            if (entry.isIntersecting) {
                const img = entry.target.querySelector('img')
                if (img.complete) {
                    markRevealed(index)
                } else {
                    img.onload = () => {
                        markRevealed(index)
                    }
                }
                observer.unobserve(entry.target)
            }
        })
    }, { threshold: 0.2 })

    document.querySelectorAll('.reveal-section').forEach((el) => {
        observer.observe(el)
    })
})
</script>
<template>
    <div>
        <!-- Сетка -->
        <div class="grid grid-cols-2 gap-0">
            <div
                v-for="(photo, index) in photos"
                :key="index"
                :data-index="index"
                :style="revealedSections.includes(index) ? `transition-delay: ${index * 60}ms` : ''"
                class="reveal-section aspect-square overflow-hidden cursor-pointer animate-fade-in-up"
                :class="{ 'entered': revealedSections.includes(index) }"
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

