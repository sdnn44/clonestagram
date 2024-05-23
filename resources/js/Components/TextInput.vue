<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        class="custom-input"
        v-model="model"
        ref="input"
    />
</template>

.<style scoped>
.custom-input {
    border-color: #d1d5db; 
    border-width: 1px; 
    border-style: solid; 
    border-radius: 0.375rem; 
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); 
    padding: 0.5rem; 
    outline: none; 
}

.custom-input:focus {
    border-color: #6366f1; 
    box-shadow: 0 0 0 1px #6366f1, 0 0 0 4px rgba(99, 102, 241, 0.5); 
}
</style>