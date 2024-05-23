<script setup>
import { ref, toRefs } from "vue";

import Heart from "vue-material-design-icons/Heart.vue";
import Comment from "vue-material-design-icons/Comment.vue";

defineEmits(["selectedPost"]);
const props = defineProps(["postByUser"]);
const { postByUser } = toRefs(props);

let isHover = ref(false);
</script>

<template>
  <div
    @mouseenter="isHover = true"
    @mouseleave="isHover = false"
    class="post-wrapper"
    @click="$emit('selectedPost', postByUser)"
  >
    <div
      v-if="isHover"
      :class="isHover ? 'post-hover' : ''"
      class="single-post"
    >
      <div class="post-card">
        <div class="post-card-item">
          <Heart fillColor="#FFFFFF" :size="30" />
          <div class="post-likes">155</div>
        </div>
        <div class="post-card-item">
          <Comment fillColor="#FFFFFF" :size="30" />
          <div class="post-comments">55</div>
        </div>
      </div>
    </div>

    <img
      class="post-img"
      src="https://avatars.akamai.steamstatic.com/84959f2c5784c3aa115f0bce94054e3d42bde523_full.jpg"
    />
  </div>
  
</template>

<style scoped>
.post-wrapper {
  display: flex;
  position: relative;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}
.single-post {
  display: flex;
  position: absolute;
  z-index: 50;
  justify-content: space-around;
  align-items: center;
  width: 100%;
  height: 100%;
  font-size: 1.125rem;
  line-height: 1.75rem;
  font-weight: 800;
  color: #ffffff;
}
.post-hover {
  background-color: #00000060;
}
.post-card {
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 50%;
}
.post-card-item {
  display: flex;
  justify-content: center;
  align-items: center;
}
.post-likes,
.post-comments {
  padding-left: 0.25;
}
.post-img {
  aspect-ratio: 1 / 1;
  object-fit: cover;
  z-index: 0;
  cursor: pointer;
  width: 300px;
}
</style>