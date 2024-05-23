<script setup>
import { ref, onMounted, toRefs } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";

import MainLayout from "@/Layouts/MainLayout.vue";
import LikesSection from "@/Components/LikesSection.vue";

import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Navigation } from "vue3-carousel";

import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";

let wWidth = ref(window.innerWidth);
let currentSlide = ref(0);
let currentPost = ref(null);
let openOverlay = ref(false);

const props = defineProps({ posts: Object, allUsers: Object });
const { posts, allUsers } = toRefs(props);

onMounted(() => {
  window.addEventListener("resize", () => {
    wWidth.value = window.innerWidth;
  });
});
</script>

<template>
  <Head title="Clonestagram" />
  <MainLayout>
    <div class="container">
      <Carousel
        v-model="currentSlide"
        class="carousel-wrapper"
        :items-to-show="wWidth >= 768 ? 8 : 6"
        :items-to-scroll="4"
        :wrap-around="true"
        :transition="500"
        snapAlign="start"
      >
        <Slide v-for="slide in 10" :key="slide">
          <Link href="/" class="slide-link">
            <div class="background-circle">
              <div class="inner-circle"></div>
            </div>
            <img
              class="user-image"
              src="https://avatars.akamai.steamstatic.com/5e8db726219b62c9232791d7bd4e2d516c252a99_full.jpg"
            />
            <div class="user-name">Name surname</div>
          </Link>
        </Slide>
      </Carousel>
      <div id="Posts">
        <div class="post-container">
          <div class="user-info">
            <Link href="/" class="user-link">
              <img
                class="user-post-image"
                src="https://avatars.akamai.steamstatic.com/5e8db726219b62c9232791d7bd4e2d516c252a99_full.jpg"
              />
              <div class="user-post-name">post.user.name<!--  --></div>
            </Link>
            <div class="post-time">
              <span class="dot-separator">.</span>
              <div>post.created_at</div>
            </div>
          </div>
          <DotsHorizontal class="cursor-pointer" :size="27" />
        </div>

        <div class="post-image-container">
          <img
            class="post-image"
            src="https://avatars.akamai.steamstatic.com/5e8db726219b62c9232791d7bd4e2d516c252a99_full.jpg"
          />
        </div>

        <LikesSection />

        <div class="likes-section">12 likes</div>
        <div><span class="user-like-name">post.user.name </span> post.text</div>
        <button
          @click="
            currentPost = post;
            openOverlay = true;
          "
          class="comments-button"
        >
          View all 4 comments
        </button>
      </div>

      <div class="padding-bottom"></div>
    </div>
  </MainLayout>
</template>

<style >
.container {
  padding-left: 0;
}

@media (min-width: 768px) {
  .container {
    padding-left: 80px;
  }
}

@media (min-width: 1024px) {
  .container {
    padding-left: 0;
  }
}

.carousel-wrapper {
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
}

.slide-link {
  position: relative;
  padding-left: 0.5rem;
  padding-right: 0.5rem;
  margin-top: 1rem;
  text-align: center;
  cursor: pointer;
}

.background-circle {
  position: absolute;
  z-index: -1;
  top: -5px;
  left: 4px;
  width: 64px;
  height: 64px;
  border-radius: 50%;
  transform: rotate(45deg);
  background: linear-gradient(to top, #fde047, #d946ef, #ef4444);
  filter: contrast(1.3);
}

.inner-circle {
  border-radius: 50%;
  margin-left: 3px;
  margin-top: 3px;
  width: 58px;
  height: 58px;
  background-color: white;
}

.user-image {
  border-radius: 50%;
  width: 56px;
  height: 56px;
  margin-top: -1px;
  margin-left: -5px;
}

.user-name {
  font-size: 0.75rem;
  margin-top: 0.5rem;
  width: 60px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

#Posts {
  padding-left: 1.2rem;
  padding-right: 1.2rem;
  margin-top: 2.5rem;
  max-width: 600px;
}

.post-container {
  display: flex;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
  justify-content: space-between;
  align-items: center;
}

.user-info {
  display: flex;
  align-items: center;
}

.user-link {
  display: flex;
  align-items: center;
}

.user-post-image {
  border-radius: 50%;
  width: 38px;
  height: 38px;
}

.user-post-name {
  margin-left: 1rem;
  font-weight: 800;
  font-size: 0.9375rem;
}

.post-time {
  display: flex;
  align-items: center;
  font-size: 0.9375rem;
  color: #6b7280;
}

.dot-separator {
  margin-top: -1.25rem;
  margin-left: 0.5rem;
  margin-right: 0.3125rem;
  font-size: 2.1875rem;
}

.post-image-container {
  background-color: black;
  border-radius: 0.5rem;
  width: 100%;
  min-height: 25rem;
  display: flex;
  align-items: center;
}

.post-image {
  margin-left: auto;
  margin-right: auto;
  width: 100%;
}

.likes-section {
  color: black;
  font-weight: 800;
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
}

.comments-button {
  color: #6b7280;
  font-weight: 600;
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
  border: none;
}
.user-like-name {
  font-weight: 600;
}

.padding-bottom {
  padding-bottom: 5rem;
}
</style>