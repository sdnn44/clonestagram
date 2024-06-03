<script setup>
import { ref, toRefs } from "vue";
import { usePage } from "@inertiajs/vue3";

import LikesSection from "@/Components/LikesSection.vue";

import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";
import EmoticonHappyOutline from "vue-material-design-icons/EmoticonHappyOutline.vue";
import Close from "vue-material-design-icons/Close.vue";

let id = ref(null);
let comment = ref("");
let deleteType = ref(null);

const user = usePage().props.auth.user;

const props = defineProps(["post"]);
const { post } = toRefs(props);

defineEmits(["closeOverlay", "addComment", "updateLike", "deleteSelected"]);

const textareaInput = (e) => {
  textarea.value.style.height = "auto";
  textarea.value.style.height = `${e.target.scrollHeight}px`;
};
</script>

<template>
  <div id="OverlaySection" class="overlay-container">
    <div class="content-wrapper">
      <div class="image-container">
        <img class="post-image" src="/user-logo.png" />
      </div>
      <div class="details-container">
        <div class="header">
          <div class="header-content">
            <img class="user-image" src="/user-logo.png" />
            <div class="user-info">
              <div class="user-name">username</div>
              <div class="post-date">post.created_at</div>
            </div>
          </div>
          <button>
            <DotsHorizontal class="cursor-pointer" :size="27" />
          </button>
        </div>
        <div class="comments-section">
          <div class="post-content">
            <img class="post-user-image" src="/user-logo.png" />
            <div class="post-text">
              <span class="post-user-name">username</span>
              <span>post text</span>
            </div>
          </div>
          <div class="comment">
            <div class="comment-header">
              <div class="comment-user-info">
                <img class="comment-user-image" src="/user-logo.png" />
                <div class="comment-user-name">username</div>
                <span class="comment-date"> post.created_at </span>
              </div>
              <DotsHorizontal class="cursor-pointer" :size="27" />
            </div>
            <div class="comment-text">comment.text</div>
          </div>
        </div>
        <LikesSection
          class="likes-section"
        />
        <div class="comment-input-section">
          <EmoticonHappyOutline class="emoji-icon" :size="30" />
          <textarea
            ref="textarea"
            :oninput="textareaInput"
            v-model="comment"
            placeholder="Add a comment..."
            rows="1"
            class="comment-textarea"
          ></textarea>
          <button
            v-if="comment"
            class="post-button"
          >
            Post
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.overlay-container {
  max-width: 72rem;
  height: calc(100% - 100px);
  margin: 2.5rem auto 0;
  background-color: white;
  border-radius: 0.75rem;
}

.content-wrapper {
  display: flex;
  width: 100%;
  height: 100%;
  overflow: auto;
  border-radius: 0.75rem;
}

.image-container {
  display: flex;
  align-items: center;
  background-color: black;
  width: 100%;
}

.post-image {
  border-radius: 0.75rem;
  min-width: 25rem;
  padding: 1rem;
  margin: auto;
}

.details-container {
  max-width: 31.25rem;
  width: 100%;
  position: relative;
}

.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.75rem;
  border-bottom: 1px solid #e5e7eb;
}

.header-content {
  display: flex;
  align-items: center;
}

.user-image {
  border-radius: 50%;
  width: 2.375rem;
  height: 2.375rem;
}

.user-info {
  display: flex;
  align-items: center;
  margin-left: 1rem;
}

.user-name {
  font-weight: 800;
  font-size: 0.9375rem;
}

.post-date {
  display: flex;
  align-items: center;
  font-size: 0.9375rem;
  color: #6b7280;
  margin-left: 0.5rem;
  margin-right: 0.3125rem;
}

.comments-section {
  overflow-y: auto;
  height: calc(100% - 10.625rem);
}

.post-content {
  display: flex;
  align-items: center;
  padding: 0.75rem;
}

.post-user-image {
  position: absolute;
  top: -0.25rem;
  border-radius: 50%;
  width: 2.375rem;
  height: 2.375rem;
}

.post-text {
  display: flex;
  align-items: center;
  margin-left: 3.5rem;
}

.post-user-name {
  font-weight: 800;
  font-size: 0.9375rem;
  margin-right: 0.5rem;
}

.comment {
  padding: 0.75rem;
}

.comment-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.comment-user-info {
  display: flex;
  align-items: center;
}

.comment-user-image {
  border-radius: 50%;
  width: 2.375rem;
  height: 2.375rem;
}

.comment-user-name {
  margin-left: 1rem;
  font-weight: 800;
  font-size: 0.9375rem;
}

.comment-date {
  font-weight: 300;
  color: #4b5563;
  font-size: 0.875rem;
}

.comment-text {
  font-size: 0.8125rem;
  padding-left: 3.4375rem;
}

.likes-section {
  padding: 0 0.5rem;
  border-top: 1px solid #e5e7eb;
  margin-bottom: 0.5rem;
}

.comment-input-section {
  position: absolute;
  bottom: 0;
  width: 100%;
  max-height: 12.5rem;
  background-color: white;
  overflow: auto;
  display: flex;
  align-items: center;
  border-top: 1px solid #e5e7eb;
}

.emoji-icon {
  padding-left: 0.75rem;
  padding-top: 0.625rem;
}

.comment-textarea {
  width: 100%;
  border: 0;
  margin-top: 0.5rem;
  margin-bottom: 0.5rem;
  font-size: 0.875rem;
  color: #4b5563;
  font-size: 1.125rem;
  outline: none;
  resize: none;
}

.post-button {
  color: #3b82f6;
  font-weight: 800;
  padding-right: 1rem;
}
</style>