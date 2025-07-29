<script setup>
import PhotoGrid from "../Components/PhotoGrid.vue";
import MainLayout from "./Layouts/MainLayout.vue";
import {onMounted, ref} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import axios from "axios"


const url = usePage().url
const category = url.split('/').pop() || 'lashes'

const title = ref('')
const photos = ref([])

onMounted(() => {
    axios.get(`/api/gallery/${category}`).then(res => {
        title.value = res.data.title
        photos.value = res.data.photos
    })
})
</script>

<template>
    <MainLayout class="text-center">
        <h2 class="text-2xl font-bold mb-6">{{ title }}</h2>
        <PhotoGrid :photos="photos" />
    </MainLayout>
</template>
