<script setup>
import OurWorks from "../Components/OurWorks.vue";
import MainLayout from "./Layouts/MainLayout.vue";

const props = defineProps({
  message: String
})
</script>
<template>
  <MainLayout>
    <OurWorks />
  </MainLayout>
</template>

