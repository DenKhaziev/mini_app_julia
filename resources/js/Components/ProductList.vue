<template>
  <div class="p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <div v-for="product in products" :key="product.id" class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
        <img :src="product.image" :alt="product.name" class="h-40 w-full object-cover">
        <div class="p-4 flex-1 flex flex-col justify-between">
          <div>
            <h3 class="text-lg font-semibold mb-2">{{ product.name }}</h3>
            <p class="text-gray-500 mb-4">{{ product.description }}</p>
          </div>
          <div class="flex items-center justify-between mt-auto">
            <span class="text-xl font-bold text-green-600">{{ product.price }} ₽</span>
            <button class="ml-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition" @click="addToCart(product)">Добавить в корзину</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const products = ref([
  {
    id: 1,
    name: 'Товар 1',
    description: 'Описание товара 1',
    price: 990,
    image: 'https://placehold.co/400x300?text=Product+1',
  },
  {
    id: 2,
    name: 'Товар 2',
    description: 'Описание товара 2',
    price: 1490,
    image: 'https://placehold.co/400x300?text=Product+2',
  },
  {
    id: 3,
    name: 'Товар 3',
    description: 'Описание товара 3',
    price: 1990,
    image: 'https://placehold.co/400x300?text=Product+3',
  },
])

function addToCart(product) {
  alert(`Добавлен в корзину: ${product.name}`)
}
</script> 