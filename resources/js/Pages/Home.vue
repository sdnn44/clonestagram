<template>
    <Head title="Welcome" />
    <p class="text-blue-100">hi!</p>
    <MainLayout>
        <div class="div-color">Home.VUE</div>
        <p class="text-red-400 mx-24">Helloo!</p>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<style >
    .div-color {
        background: green;
    }
</style>