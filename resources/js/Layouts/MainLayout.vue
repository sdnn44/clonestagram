<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

import Magnify from 'vue-material-design-icons/Magnify.vue';

let showCreatePost = ref(false);
</script>

<template>
    <div id="MainLayout" class="bg-red-600">
        <div class="div">MainLayout</div>
        <slot />
    </div>
</template>
