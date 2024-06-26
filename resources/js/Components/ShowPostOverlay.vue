<script setup>
import { ref, toRefs } from "vue";
import { usePage } from "@inertiajs/vue3";

import LikesSection from "@/Components/LikesSection.vue";
import ShowPostOptionsOverlay from "@/Components/ShowPostOptionsOverlay.vue";

import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";
import EmoticonHappyOutline from "vue-material-design-icons/EmoticonHappyOutline.vue";
import Close from "vue-material-design-icons/Close.vue";

let id = ref(null);
let comment = ref("");
let deleteType = ref(null);

console.log("Clicked!");

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
    <button class="close-overlay" @click="$emit('closeOverlay')">
      <Close :size="27" fillColor="#FFFFFF" />
    </button>

    <div class="content-wrapper">
      <div class="post-wrapper">
        <div class="image-container">
          <img src="/user-logo.png" />
        </div>

        <div class="details-container">
          <div class="header">
            <div class="header-content">
              <img class="post-image" src="/user-logo.png" />
              <div class="user-name">post.user.name</div>
              <div class="post-date">
                <span>.</span>
                <div>post.created_at</div>
              </div>
            </div>
            <button class="button-dots">
              <DotsHorizontal :size="27" />
            </button>
          </div>

          <div class="comments-section">
            <div class="post-content">
              <div class="post-content-wrapper">
                <img class="post-user-image" src="/user-logo.png" />
                <div class="post-margin">
                  <span class="post-user-name"> post.user.name </span>
                  <span class="post-text"> post.text </span>
                </div>
              </div>
            </div>

            <div class="comment-padding">
              <div class="comment-wrapper">
                <div class="comment">
                  <img src="/user-logo.png" />
                  <div class="comment-username">
                    comment.user.name
                    <span class="font-light text-gray-700 text-sm">
                      post.created_at
                    </span>
                  </div>
                </div>
                <button class="button-dots">
                  <DotsHorizontal :size="27" />
                </button>
              </div>
              <div class="comment-text">comment.text</div>
            </div>
            <div class="comment-divider"></div>
          </div>
          <LikesSection class="likes-section" />
          <div class="write-comment-wrapper">
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
              @click="
                $emit('addComment', { post, user, comment });
                comment = '';
              "
            >
              Post
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <ShowPostOptionsOverlay v-if="deleteType"/>
</template>

<style scoped>
.overlay-container {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 50;
  padding: 0.75rem;
  width: 100%;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.6);
}
.close-overlay {
  position: absolute;
  right: 2rem;
  background: transparent;
  border: none;
}

.content-wrapper {
  margin-top: 2.5rem;
  border-radius: 0.75rem;
  max-width: 72rem;
  background-color: #ffffff;
  height: calc(100%-100px);
  margin-left: auto;
  margin-right: auto;
}
.post-wrapper {
  overflow: auto;
  border-radius: 0.75rem;
  width: 100%;
  height: 100%;
}
@media (min-width: 768px) {
  .post-wrapper {
    display: flex;
  }
}
.image-container {
  display: flex;
  align-items: center;
  background: black;
  width: 100%;
}
.image-container img {
  padding: 1rem;
  border-radius: 0.75rem;
  min-width: 400px;
  margin-left: auto;
  margin-right: auto;
}

.post-image {
  border-radius: 9999px;
  width: 38px;
  height: 38px;
}

.details-container {
  position: relative;
  width: 100%;
}

@media (min-width: 768px) {
  .details-container {
    max-width: 500px;
  }
}

.header {
  display: flex;
  padding: 0.75rem;
  justify-content: space-between;
  align-items: center;
  border-bottom-width: 1px;
}

.header-content {
  display: flex;
  align-items: center;
}
.button-dots {
  cursor: pointer;
  border: none;
}
.user-image {
  border-radius: 9999px;
  width: 38px;
  height: 38px;
}

.user-name {
  margin-left: 1rem;
  font-weight: 800;
  font-size: 15px;
}

.post-date {
  display: flex;
  align-items: center;
  color: #6b7280;
  font-size: 15px;
}
.post-date span {
  margin-left: 0.5rem;
  margin-top: -1.25rem;
  margin-right: 5px;
  font-size: 35px;
}

.comments-section {
  overflow-y: auto;
  height: calc(100%-170px);
}

.post-content {
  display: flex;
  align-items: center;
  padding: 0.75rem;
  justify-content: space-between;
}
.post-content-wrapper {
  display: flex;
  align-items: center;
  position: relative;
  width: 100%;
}
.post-margin {
  margin-left: 3.5rem;
  width: 100%;
}
.post-user-image {
  position: absolute;
  top: -0.25rem;
  border-radius: 9999px;
  width: 38px;
  height: 38px;
}

.post-text {
  margin-left: 1rem;
}

.post-user-name {
  font-weight: 800;
  font-size: 15px;
}
.post-text {
  color: #111827;
  font-size: 15px;
}
.comment-padding {
  padding: 0.75rem;
}
.comment-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.comment-wrapper img {
  border-radius: 9999px;
  width: 38px;
  height: 38px;
}
.comment-username {
  margin-left: 1rem;
  font-weight: 800;
  font-size: 15px;
}
.comment-username span {
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 300;
  color: #374151;
}
.comment {
  display: flex;
  align-items: center;
}
.comment-text {
  font-size: 13px;
  padding-left: 55px;
}
.comment-divider {
  padding-bottom: 4rem;
}
@media (min-width: 768px) {
  .comment-divider {
    display: none;
  }
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
  padding-right: 1rem;
  padding-right: 1rem;
  margin-bottom: 0.5rem;
  margin-top: 100%;
  border-top-width: 1px;
}
.write-comment-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: auto;
  position: absolute;
  bottom: 0;
  border-width: 1px;
  width: 100%;
  background-color: #ffffff;
  max-height: 200px;
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
  padding: 0.75rem;
}

.comment-textarea {
  z-index: 50;
  margin-top: 0.5rem;
  margin-bottom: 0.5rem;
  border-width: 0;
  width: 100%;
  font-size: 0.875rem;
  line-height: 1.25rem;
  color: #4b5563;
}

.post-button {
  border: none;
  padding-right: 1rem;
  font-weight: 800;
  color: #2563eb;
}
</style>