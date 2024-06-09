<script setup>
import { toRefs } from "vue";

defineEmits(["close", "deleteSelected"]);
const props = defineProps({ deleteType: String, id: Number });
const { deleteType, id } = toRefs(props);
</script>

<template>
  <div id="ShowPostOptionsOverlay">
    <div class="show-post-options-wrapper">
      <button @click="$emit('deleteSelected', { deleteType, id })">
        Delete {{ deleteType }}
      </button>
      <div class="cancel-button" @click="$emit('close')">Cancel</div>
    </div>
  </div>
</template>

<style scoped>
#ShowPostOptionsOverlay {
  display: flex;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 50;
  padding: 0.75rem;
  align-items: center;
  width: 100%;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.6);
}
.show-post-options-wrapper {
  margin-top: 2.5rem;
  border-radius: 0.75rem;
  width: 100%;
  max-width: 24rem;
  text-align: center;
  background-color: #ffffff;
}
.show-post-options-wrapper button {
  padding: 0.75rem;
  border-bottom-width: 1px;
  width: 100%;
  font-size: 1.125rem;
  line-height: 1.75rem;
  font-weight: 800;
  color: #dc2626;
  cursor: pointer;
}
.cancel-button {
  padding: 0.75rem;
  font-size: 1.125rem;
  line-height: 1.75rem;
}
</style>