<script setup>
</script>

<template>
  <div class="guest-layout-container">
    <div class="guest-layout-content">
      <slot />
    </div>
  </div>
</template>

<style scoped>
.guest-layout-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  min-height: 100vh;
  background-color: #f3f4f6;
}
.guest-layout-content {
  overflow: hidden;
  padding-top: 1rem;
  padding-bottom: 1rem;
  padding-left: 1.5rem;
  padding-right: 1.5rem;
  margin-top: 1.5rem;
  width: 100%;
  background-color: #ffffff;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
    0 2px 4px -1px rgba(0, 0, 0, 0.06);
}
@media (min-width: 640px) {
  .guest-layout-content {
    border-radius: 0.5rem;
    max-width: 28rem;
  }
}
</style>