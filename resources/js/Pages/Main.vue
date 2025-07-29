<script setup>
import MainPage from '../Components/MainPage.vue'
import MainLayout from "./Layouts/MainLayout.vue";

const props = defineProps({
  message: String
})
</script>
<template>
  <div class="text-center">
      <MainLayout>
         <MainPage />
      </MainLayout>
  </div>
</template>

