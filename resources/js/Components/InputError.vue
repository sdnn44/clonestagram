<script setup>
defineProps({
  message: {
    type: String,
  },
});
</script>

<template>
  <div v-show="message">
    <p class="input-error">
      {{ message }}
    </p>
  </div>
</template>

<style scoped>
.input-error {
  font-size: 0.875rem;
  line-height: 1.25rem;
  color: rgb(220 38 38 / var(--tw-text-opacity));
}
</style>