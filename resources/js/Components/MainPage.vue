<template>
    <div class="min-h-screen p-4 space-y-6 bg-zinc-900 text-white">
      <div class="text-center space-y-1">
        <h1 class="text-3xl font-bold">Organic Beauty Studio</h1>
        <p class="text-sm text-zinc-400">твоё пространство красоты</p>
      </div>
  
      <div
        v-for="(section, index) in sections"
        :key="index"
        class="rounded-2xl overflow-hidden shadow-lg bg-zinc-800"
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
  
      <div class="flex flex-col gap-4 pt-4">
        <a
          href="https://t.me/your_bot_or_booking_link"
          class="bg-gradient-to-r from-zinc-700 to-zinc-600 text-white py-3 px-4 rounded-2xl text-center font-semibold shadow-md hover:from-zinc-600 hover:to-zinc-500 transition-all duration-200"
        >
          Записаться онлайн
        </a>
        <a
          href="https://wa.me/1234567890"
          class="bg-gradient-to-r from-green-800 to-green-700 text-white py-3 px-4 rounded-2xl text-center font-semibold shadow-md hover:from-green-700 hover:to-green-600 transition-all duration-200"
        >
          Написать в WhatsApp
        </a>
      </div>
    </div>
  </template>
  
  <script setup>
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
  </script>
  