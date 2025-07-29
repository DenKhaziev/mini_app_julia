<script setup>
import { ref, onMounted } from 'vue'

const sections = [
    {
        image: '/storage/main/IMG_4303.jpeg',
        text: 'Идеальное место для релакса и ухода за собой',
    },
    {
        image: '/storage/main/IMG_8793.jpg',
        text: 'Профессиональный уход и натуральные средства',
    },
    {
        image: '/storage/main/IMG_1004.jpg',
        text: 'Тёплая атмосфера и индивидуальный подход к каждой гостье',
    },
    {
        image: '/storage/main/IMG_1590.jpg',
        text: 'Уютный интерьер и внимание к деталям — всё для вашего комфорта',
    },
]

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
    <div>
        <div
            v-for="(section, index) in sections"
            :key="index"
            :data-index="index"
            class="reveal-section overflow-hidden shadow-lg bg-zinc-900 animate-fade-in-up"
            :class="{ 'entered': revealedSections.includes(index) }"
        >
            <img
                :src="section.image"
                alt="beauty section"
                class="w-full h-64 object-cover"
            />
            <div class="p-4">
                <p class="text-zinc-200 text-base">{{ section.text }}</p>
            </div>
        </div>

        <!-- Кнопки -->
        <div class="flex flex-col gap-4 pt-4">
            <a
                href="https://t.me/your_bot_or_booking_link"
                class="bg-gradient-to-r from-zinc-900 to-zinc-800 text-white py-3 px-4 text-center font-semibold shadow-md hover:from-zinc-600 hover:to-zinc-500 transition-all duration-200 border-2 rounded-md"
            >
                Записаться онлайн
            </a>
            <a
                href="https://wa.me/1234567890"
                class="bg-gradient-to-r from-green-900 to-green-800 text-white py-3 px-4 text-center font-semibold shadow-md hover:from-green-800 hover:to-green-700 transition-all duration-200 border-2 rounded-md"
            >
                Написать в WhatsApp
            </a>
        </div>
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
