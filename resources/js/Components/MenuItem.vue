<script setup>
import { toRefs } from "vue";
import { usePage } from "@inertiajs/vue3";

import HomeOutline from "vue-material-design-icons/HomeOutline.vue";
import Magnify from "vue-material-design-icons/Magnify.vue";
import Compass from "vue-material-design-icons/Compass.vue";
import SendOutline from "vue-material-design-icons/SendOutline.vue";
import HeartOutline from "vue-material-design-icons/HeartOutline.vue";
import Plus from "vue-material-design-icons/Plus.vue";
import AccountOutline from "vue-material-design-icons/AccountOutline.vue";
import Menu from "vue-material-design-icons/Menu.vue";

const props = defineProps({ iconString: String });
const { iconString } = toRefs(props);

// const user = usePage().props.auth.user;
let icon = null;

if (iconString.value === "Home") icon = HomeOutline;
if (iconString.value === "Search") icon = Magnify;
if (iconString.value === "Explore") icon = Compass;
if (iconString.value === "Messages") icon = SendOutline;
if (iconString.value === "Notifications") icon = HeartOutline;
if (iconString.value === "Create") icon = Plus;
if (iconString.value === "Profile") icon = AccountOutline;
if (iconString.value === "Log out") icon = Menu;
</script>

<template>
  <div class="nav-item">
    <div class="nav-content">
      <img
        v-if="iconString === 'Profile'"
        :class="{ 'icon-margin': iconString === 'Profile' }"
        class="user-icon"
        src="https://avatars.akamai.steamstatic.com/5e8db726219b62c9232791d7bd4e2d516c252a99_full.jpg"
      />
      <component v-else :is="icon" fillColor="#000000" :size="36" />
      <span class="nav-text">
        {{ iconString }}
      </span>
    </div>
  </div>
</template>

<style scoped>
.nav-item {
  width: 100%;
  padding: 0.5rem;
  border-radius: 9999px;
  transition: background-color 0.3s ease-in-out;
  cursor: pointer;
}

@media (min-width: 1280px) {
  .nav-item:hover {
    background-color: #f3f4f6;
    display: inline-block;
  }
}

.nav-content {
  display: flex;
  align-items: center;
}

.user-icon {
  border-radius: 9999px;
  margin-left: 2px;
  width: 30px;
  cursor: pointer;
}

.icon-margin {
  margin-right: 0.25rem;
}

/* Text styling */
.nav-text {
  display: none;
  color: #000000;
  font-weight: 500;
  font-size: 18px;
  padding-left: 0.5rem;
  margin-top: 0.125rem;
}

@media (min-width: 1280px) {
  .nav-text {
    display: block;
  }
}
</style>