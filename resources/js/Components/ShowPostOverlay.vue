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
            <button>
              <DotsHorizontal class="cursor-pointer" :size="27" />
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
          </div>
        </div>
        <!--
            <div class="comment-padding">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <img
                    class="rounded-full w-[38px] h-[38px]"
                    src="/user-logo.png"
                  />
                  <div class="ml-4 font-extrabold text-[15px]">
                    comment.user.name
                    <span class="font-light text-gray-700 text-sm">
                      post.created_at
                    </span>
                  </div>
                </div>

                <DotsHorizontal :size="27" />
              </div>

              <div class="text-[13px] pl-[55px]">comment.text</div>
            </div>

            <div class="pb-16 md:hidden"></div>
          </div>

          <LikesSection class="likes-section" />

          <div
            class="absolute flex border bottom-0 w-full max-h-[200px] bg-white overflow-auto"
          >
            <EmoticonHappyOutline class="pl-3 pt-[10px]" :size="30" />
            <textarea
              ref="textarea"
              :oninput="textareaInput"
              v-model="comment"
              placeholder="Add a comment..."
              rows="1"
              class="w-full border-0 mt-2 mb-2 text-sm z-50 focus:ring-0 text-gray-600 text-[18px]"
            ></textarea>
            <button
              v-if="comment"
              class="text-blue-600 font-extrabold pr-4"
              @click="
                $emit('addComment', { post, user, comment });
                comment = '';
              "
            >
              Post
            </button>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <!-- 
  <div id="OverlaySection" class="overlay-container">
    <button class="close-overlay" @click="$emit('closeOverlay')">
      <Close :size="27" fillColor="#FFFFFF" />
    </button>

    <div class="">
      <div class="">
        <div class="">
          <img class="post-image" src="/user-logo.png" />
        </div>
        <div class="">
          <div class="header">
            <div class="header-content">
              <img class="user-image" src="/user-logo.png" />
              <div class="user-name">username</div>
              <div class="post-date">
                <span>.</span>
                <div>post.created_at</div>
              </div>
            </div>
            <button>
              <DotsHorizontal class="cursor-pointer" :size="27" />
            </button>
          </div>
          <div class="comments-section">
            <div class="">
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
          <LikesSection class="likes-section" />
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
            <button v-if="comment" class="post-button">Post</button>
          </div>
        </div>
      </div>
    </div>
  </div> -->
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
  /* overflow-y: auto; */
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
  padding-left: 0.5rem;
  padding-right: 0.5rem;
  margin-bottom: 0.5rem;
  border-top-width: 1px;
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