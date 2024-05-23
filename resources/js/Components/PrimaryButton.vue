<script setup>
defineProps({
  type: {
    type: String,
    default: "submit",
  },
});
</script>

<template>
  <button class="button-overlay">
    <slot />
  </button>
</template>

<style scoped>
button {
    border: none;
}
.button-overlay {
  padding: 0.375rem;
  border-radius: 0.5rem;
  width: 100%;
  font-size: 1.125rem;
  line-height: 1.75rem;
  font-weight: 800;
  color: #ffffff;
  background: #0095f6;
}
.button-overlay:hover {
  background: #2150fa;
}
</style>