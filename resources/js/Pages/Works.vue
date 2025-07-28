<script setup>
import ProductList from '../Components/ProductList.vue'
import MainPage from '../Components/MainPage.vue'

const props = defineProps({
  message: String
})
</script> 
<template>
  <div class="text-center">
    <MainPage />
  </div>
</template>

