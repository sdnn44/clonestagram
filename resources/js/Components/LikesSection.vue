<script setup>
import { computed, toRefs } from "vue";
import { usePage } from "@inertiajs/vue3";

import Heart from "vue-material-design-icons/Heart.vue";
import HeartOutline from "vue-material-design-icons/HeartOutline.vue";
import CommentOutline from "vue-material-design-icons/CommentOutline.vue";
import SendOutline from "vue-material-design-icons/SendOutline.vue";
import BookmarkOutline from "vue-material-design-icons/BookmarkOutline.vue";

const props = defineProps(["post"]);
const { post } = toRefs(props);

const emit = defineEmits(["like"]);

// const user = usePage().props.auth.user;

// const isHeartActiveComputed = computed(() => {
//   let isTrue = false;

//   for (let i = 0; i < post.value.likes.length; i++) {
//     const like = post.value.likes[i];
//     if (like.user_id === user.id && like.post_id === post.value.id) {
//       isTrue = true;
//     }
//   }

//   return isTrue;
// });
</script>

<template>
  <div class="likes-container">
    <div class="likes-inner-container">
      <button @click="$emit('like', { post, user })" class="like-button">
        <!-- <HeartOutline
          v-if="!isHeartActiveComputed"
          class="likes-icon"
          :size="30"
        /> -->
        <Heart class="likes-icon" fillColor="#FF0000" :size="30" />
      </button>
      <CommentOutline class="activity-icon" :size="30" />
      <SendOutline class="activity-icon" :size="30" />
    </div>
    <BookmarkOutline class="activity-icon" :size="30" />
  </div>
</template>

<style scoped>
.likes-container {
  display: flex;
  z-index: 20;
  align-items: center;
  justify-content: space-between;
}

.likes-inner-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 5px;
}

.like-button {
  border: none;
}

.cursor-pointer {
  cursor: pointer;
}
.likes-icon {
  cursor: pointer;
}
.activity-icon {
  padding-left: 20px;
}
</style>