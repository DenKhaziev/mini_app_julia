<script setup>
import { ref, onMounted } from 'vue'

const revealedSections = ref([])

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
    <div
        class="reveal-section animate-fade-in-up"
        :class="{ entered: revealedSections.includes(1) }"
        data-index="1"
    >
        <video
            autoplay
            loop
            muted
            playsinline
            class="w-full rounded-2xl shadow-lg"
        >
            <source :src="`${import.meta.env.VITE_APP_URL}/videos/about.mp4`" type="video/mp4" />

            Ваш браузер не поддерживает видео.
        </video>
    </div>
</template>




<style scoped>
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
