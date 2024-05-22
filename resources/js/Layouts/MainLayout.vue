<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

import MenuItem from "@/Components/MenuItem.vue";
import CreatePostOverlay from "@/Components/CreatePostOverlay.vue";

import HeartOutline from "vue-material-design-icons/HeartOutline.vue";
import Magnify from "vue-material-design-icons/Magnify.vue";
import ChevronLeft from "vue-material-design-icons/ChevronLeft.vue";
import AccountPlusOutline from "vue-material-design-icons/AccountPlusOutline.vue";

import HomeOutline from "vue-material-design-icons/HomeOutline.vue";
import Compass from "vue-material-design-icons/Compass.vue";
import SendOutline from "vue-material-design-icons/SendOutline.vue";
import Plus from "vue-material-design-icons/Plus.vue";
import AccountOutline from "vue-material-design-icons/AccountOutline.vue";

let showCreatePost = ref(false);
</script>

<template>
  <div id="main-layout" class="wrapper">
    <div v-if="$page.url === '/'" id="top-nav">
      <div id="top-nav-items">
        <Link href="/">
          <img id="logo" src="/logo-default.png" alt="logo" />
        </Link>
        <div class="search-container">
          <div id="search-items">
            <Magnify id="search-icon" fillColor="#8E8E8E" />
            <input
              type="text"
              placeholder="Search"
              class="search-input"
              size="27"
            />
          </div>
          <HeartOutline class="heart-icon" fillColor="#000000" :size="27" />
        </div>
      </div>
    </div>
    <div v-if="$page.url !== '/'" id="top-nav-user">
      <Link href="/" class="user-link">
        <ChevronLeft :size="30" class="chevron-left" />
      </Link>
      <div class="user-name">Name here</div>
      <AccountPlusOutline :size="30" class="user-link chevron-left" />
    </div>
    <div id="SideNav" class="side-nav">
      <Link href="/">
        <img class="small-logo" src="/logo-small.png" alt="Small Logo" />
        <img class="large-logo" src="/logo-default.png" alt="Large Logo" />
      </Link>

      <div class="px-3">
        <Link href="/">
          <MenuItem iconString="Home" class="menu-item" />
        </Link>
        <MenuItem iconString="Search" class="menu-item" />
        <MenuItem iconString="Explore" class="menu-item" />
        <MenuItem iconString="Messages" class="menu-item" />
        <MenuItem iconString="Notifications" class="menu-item" />
        <MenuItem
          @click="showCreatePost = true"
          iconString="Create"
          class="menu-item"
        />
        <Link href="/">
          <MenuItem iconString="Profile" class="menu-item" />
        </Link>
      </div>
      <Link class="logout">
        <MenuItem iconString="Log out" class="menu-item" />
      </Link>
    </div>

    <div class="main-container">
      <div
        class="content-container"
        :class="$page.url === '/' ? 'wide-content' : 'max-content'"
      >
        <main>
          <slot />
        </main>
      </div>

      <div
        v-if="$page.url === '/'"
        id="SuggestionsSection"
        class="suggestions-section"
      >
        <a href="/" class="user-profile-link">
          <div class="user-info">
            <img
              class="user-image"
              src="https://avatars.akamai.steamstatic.com/5e8db726219b62c9232791d7bd4e2d516c252a99_full.jpg"
              alt="User Image"
            />
            <div class="user-details">
              <div class="user-name">Name</div>
              <div class="user-username">Name</div>
            </div>
          </div>
          <button class="switch-button">Switch</button>
        </a>

        <div class="suggestions-header">
          <div class="suggestions-title">Suggestions for you</div>
          <button class="see-all-button">See All</button>
        </div>

        <!-- <div class="suggested-user">
          <a href="/" class="user-profile-link">
            <div class="user-info">
              <img
                class="suggested-user-image"
                :src="randUser.file"
                alt="Suggested User Image"
              />
              <div class="user-details">
                <div class="user-name">Name</div>
                <div class="suggested-text">Suggested for you</div>
              </div>
            </div>
            <button class="follow-button">Follow</button>
          </a>
        </div> -->

        <a href="/" class="user-profile-link">
          <div class="user-info">
            <img
              class="user-image"
              src="https://avatars.akamai.steamstatic.com/5e8db726219b62c9232791d7bd4e2d516c252a99_full.jpg"
              alt="User Image"
            />
            <div class="user-details">
              <div class="user-name">Name</div>
              <div class="user-username">Name</div>
            </div>
          </div>
          <button class="switch-button">Switch</button>
        </a>

        <div class="footer">
          <div class="footer-links">
            About Help Press API Jobs Privacy Terms Locations Language Meta
            Verified
          </div>
          <div class="footer-text">© 2023 INSTAGRAM FROM META</div>
        </div>
      </div>
    </div>
    <div id="BottomNav" class="bottom-nav">
      <Link href="/">
        <HomeOutline
          fillColor="#000000"
          :size="33"
          class="icon cursor-pointer"
        ></HomeOutline>
      </Link>
      <Compass
        fillColor="#000000"
        :size="33"
        class="icon cursor-pointer"
      ></Compass>
      <SendOutline
        fillColor="#000000"
        :size="33"
        class="icon cursor-pointer"
      ></SendOutline>
      <Plus
        @click="showCreatePost = true"
        fillColor="#000000"
        :size="33"
        class="icon cursor-pointer"
      ></Plus>
      <AccountOutline
        fillColor="#000000"
        :size="33"
        class="icon cursor-pointer"
      ></AccountOutline>
      <Link href="/">
        <img
          class="profile-img"
          src="https://avatars.akamai.steamstatic.com/5e8db726219b62c9232791d7bd4e2d516c252a99_full.jpg"
          alt="User Profile Image"
        />
      </Link>
    </div>
  </div>
  <CreatePostOverlay
    v-if="showCreatePost"
    @close="($event) => (showCreatePost = false)"
  />
</template>

<style scoped>
.wrapper {
  width: 100%;
  height: 100%;
}

#top-nav {
  position: fixed;
  width: 100%;
  z-index: 20;
  display: block;
  background: white;
  height: 61px;
  border-bottom: 1px solid rgb(103, 101, 101);
}

@media (768px <= width) {
  #top-nav {
    display: none;
  }
}

#top-nav-items {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 100%;
}

#logo {
  width: 105px;
  margin-left: 1.5rem;
  cursor: pointer;
}

.search-container {
  display: flex;
  align-items: center;
  width: 50%;
}

#search-items {
  display: flex;
  align-items: center;
  width: 100%;
  background-color: #f3f4f6;
  border-radius: 0.5rem;
}

.search-icon {
  padding-left: 1rem;
  fill: #8e8e8e;
}

input {
  background-color: transparent;
  width: 80%;
  color: #8e8e8e;
  border: none;
  outline: none;
  font-size: 1rem;
}

.search-input:focus {
  outline: none;
}
.heart-icon {
  padding-left: 16px;
  padding-right: 12px;
}

#top-nav-user {
  position: fixed;
  display: flex;
  align-items: center;
  justify-content: space-between;
  z-index: 20;
  width: 100%;
  background: #fff;
  height: 61px;
  border-bottom: rgb(103, 101, 101);
}
@media (768px <= width) {
  #top-nav-user {
    display: none;
  }
}
.user-link {
  padding-left: 16px;
  padding-right: 16px;
}
.chevron-left {
  cursor: pointer;
}

.side-nav {
  position: fixed;
  height: 100%;
  background-color: white;
  border-right: 1px solid #d1d5db;
  display: none;
}

@media (min-width: 768px) {
  .side-nav {
    display: block;
  }
}

.side-nav {
  width: 80px;
}

@media (min-width: 1280px) {
  .side-nav {
    width: 280px;
  }
}

.small-logo {
  display: block;
  width: 25px;
  margin-top: 2.5rem;
  margin-left: 1.5rem;
  margin-bottom: 2.5rem;
  cursor: pointer;
}

.large-logo {
  display: none;
  width: 120px;
  margin-top: 2.5rem;
  margin-left: 1.5rem;
  margin-bottom: 2.5rem;
  cursor: pointer;
}

@media (min-width: 1280px) {
  .small-logo {
    display: none;
  }

  .large-logo {
    display: block;
  }
}
.menu-item {
  margin-bottom: 16px;
}
.logout {
  position: absolute;
  bottom: 0;
  padding-right: 12px;
  padding-left: 12px;
  width: 100%;
}

.main-container {
  display: flex;
  justify-content: space-between;
  background-color: white;
  height: 100%;
  width: calc(100% - 280px);
  padding-left: 280px;
  overflow: auto;
}

@media (max-width: 1279px) {
  .main-container {
    padding-left: 100px;
  }
}

@media (max-width: 1024px) {
  .main-container {
    padding-left: 0;
  }
}

.content-container {
  margin: 0 auto;
  padding-top: 5rem;
}

@media (min-width: 768px) {
  .content-container {
    padding-top: 1.5rem;
  }
}

.wide-content {
  width: 100%;
}

@media (min-width: 1024px) {
  .wide-content {
    width: 66.666667%;
  }
}

.max-content {
  max-width: 1200px;
}

.suggestions-section {
  width: 33.333333%; 
  display: none;
  color: #000000; 
  margin-top: 2.5rem; 
  margin-left: 1.2rem;
}

@media (min-width: 1024px) {
  .suggestions-section {
    display: block;
  }
}

.user-profile-link {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 300px;
}

.user-info {
  display: flex;
  align-items: center;
}

.user-image {
  border-radius: 9999px; 
  width: 58px; 
  height: 58px; 
  z-index: 10;
}

.user-details {
  padding-left: 1rem;
}

.user-name {
  color: #000000; 
  font-weight: 800; 
}

.user-username {
  color: #6b7280; 
  font-weight: 800; 
  font-size: 0.875rem; 
}

.switch-button {
  color: #3b82f6; 
  font-size: 0.75rem; 
  font-weight: 800; 
  transition: color 0.3s;
}

.switch-button:hover {
  color: #1f2937; 
}

.suggestions-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 300px;
  padding-top: 0.75rem; 
  padding-bottom: 0.75rem; 
}

.suggestions-title {
  color: #6b7280;
  font-weight: 800; 
}

/* See All Button */
.see-all-button {
  color: #3b82f6; /* equivalent to text-blue-500 */
  font-size: 0.75rem; /* equivalent to text-xs */
  font-weight: 800; 
  transition: color 0.3s;
}

.see-all-button:hover {
  color: #1f2937; 
}

.suggested-user {
  margin-bottom: 0.5rem; 
}

.suggested-user-image {
  border-radius: 9999px; 
  width: 37px;
  height: 37px; 
  z-index: 10;
}

.suggested-text {
  color: #6b7280; 
  font-weight: 800; 
  font-size: 0.875rem; 
}

.follow-button {
  color: #3b82f6;
  font-size: 0.75rem; 
  font-weight: 800; 
  transition: color 0.3s;
}

.follow-button:hover {
  color: #1f2937; 
}

.footer {
  max-width: 300px;
  margin-top: 1.25rem; 
}

.footer-links {
  font-size: 0.875rem; 
  color: #9ca3af; 
}

.footer-text {
  text-align: left;
  color: #9ca3af; 
  margin-top: 1rem; 
}
.bottom-nav {
  position: fixed;
  z-index: 30;
  bottom: 0;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-around;
  background-color: #ffffff;
  border-top: 1px solid #d1d5db; 
  padding: 0.5rem 0;
}

@media (min-width: 768px) {
  .bottom-nav {
    display: none; 
  }
}

.icon {
  cursor: pointer;
}

.profile-img {
  border-radius: 9999px; 
  width: 30px; 
  cursor: pointer;
}
</style>