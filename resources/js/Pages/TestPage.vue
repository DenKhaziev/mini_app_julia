<script setup>
import ProductList from '../Components/ProductList.vue'

const props = defineProps({
  message: String
})
</script> 
<template>
  <div class="p-8 text-center">
    <h1 class="text-2xl font-bold mb-4">Inertia Test Page</h1>
    <ProductList class="mb-8" />
    <p class="text-lg">{{ message }}</p>
  </div>
</template>

