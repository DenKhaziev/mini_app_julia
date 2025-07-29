<script setup>

import LashesComponent from "../Components/LashesComponent.vue";
import MainLayout from "./Layouts/MainLayout.vue";
import PhotoGrid from "../Components/PhotoGrid.vue";
// defineProps({
//     photos: Array,
//     title: String
// })
</script>

<template>
    <MainLayout class="text-center">
        <h2 class="text-2xl font-bold mb-4">{{ title }}</h2>
<!--        <PhotoGrid :photos="photos" />-->
        <LashesComponent/>
    </MainLayout>
</template>

<style scoped>

</style>
