<script setup>
import { reactive, toRefs } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";

import MainLayout from "@/Layouts/MainLayout.vue";
import ContentOverlay from "@/Components/ContentOverlay.vue";

import Cog from "vue-material-design-icons/Cog.vue";
import Grid from "vue-material-design-icons/Grid.vue";
import PlayBoxOutline from "vue-material-design-icons/PlayBoxOutline.vue";
import BookmarkOutline from "vue-material-design-icons/BookmarkOutline.vue";
import AccountBoxOutline from "vue-material-design-icons/AccountBoxOutline.vue";

let data = reactive({ post: null });
const form = reactive({ file: null });

const props = defineProps({ postsByUser: Object, user: Object });
const { postsByUser, user } = toRefs(props);

const getUploadedImage = (e) => {
  form.file = e.target.files[0];
  router.post(`/users`, form, {
    preserveState: false,
  });
};
</script>

<template>
  <Head title="Clonestagram" />
  <MainLayout>
    <div class="spacing"></div>
    <div class="user-container">
      <div class="flex-container">
        <label for="fileUser">
          <img
            class="profile-image"
            src="https://avatars.akamai.steamstatic.com/b46e751268cf9d5335d744cb39aaba9a2b724290_full.jpg"
          />
        </label>
        <input
          id="fileUser"
          class="hidden-input"
          type="file"
          @input="($event) => getUploadedImage($event)"
        />
        <div class="user-profile">
          <div class="user-info">
            <div class="username">user name</div>
            <button class="edit-profile">Edit Profile</button>
            <Cog :size="28" class="edit-profile-icon" />
          </div>
          <button class="edit-profile-md">Edit Profile</button>
          <div class="user-stats-container">
            <div class="user-stats">
              <div class="stat-item">
                <span>111</span>
                posts
              </div>
              <div class="stat-item"><span>123</span> followers</div>
              <div class="stat-item"><span>456</span> following</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="profile-action-mobile">
      <div class="profile-action-mobile-container">
        <div class="profile-action-stats text-center">
          <div class="profile-stat-value">144</div>
          <div class="profile-stat-label">posts</div>
        </div>
        <div class="profile-action-stats text-center">
          <div class="profile-stat-value">43</div>
          <div class="profile-stat-label">followers</div>
        </div>
        <div class="profile-action-stats text-center">
          <div class="profile-stat-value">55</div>
          <div class="profile-stat-label">following</div>
        </div>
      </div>

      <div class="profile-action-footer">
        <div class="profile-action-button active">
          <Grid :size="28" fillColor="#0095F6" class="cursor-pointer" />
        </div>
        <div class="profile-action-button">
          <PlayBoxOutline
            :size="28"
            fillColor="#8E8E8E"
            class="cursor-pointer"
          />
        </div>
        <div class="profile-action-button">
          <BookmarkOutline
            :size="28"
            fillColor="#8E8E8E"
            class="cursor-pointer"
          />
        </div>
        <div class="profile-action-button">
          <AccountBoxOutline
            :size="28"
            fillColor="#8E8E8E"
            class="cursor-pointer"
          />
        </div>
      </div>
    </div>

    <div id="ContentSection" class="content-section">
      <div class="content-section-header">
        <div class="content-section-tabs">
          <div class="content-tab_active">
            <div class="tab-icon">
              <Grid :size="15" fillColor="#000000" class="cursor-pointer" />
            </div>
            <div class="tab-label">POSTS</div>
          </div>
          <div class="content-tab">
            <div class="tab-icon">
              <PlayBoxOutline
                :size="15"
                fillColor="#8E8E8E"
                class="cursor-pointer"
              />
            </div>
            <div class="tab-label">REELS</div>
          </div>
          <div class="content-tab">
            <div class="tab-icon">
              <BookmarkOutline
                :size="15"
                fillColor="#8E8E8E"
                class="cursor-pointer"
              />
            </div>
            <div class="tab-label">SAVED</div>
          </div>
          <div class="content-tab">
            <div class="tab-icon">
              <AccountBoxOutline
                :size="15"
                fillColor="#8E8E8E"
                class="cursor-pointer"
              />
            </div>
            <div class="tab-label">TAGGED</div>
          </div>
        </div>
      </div>

      <div class="content-grid">
        <div>
          <!-- :postByUser="postByUser" -->
          <!-- @selectedPost="($event) => (data.post = $event)" -->
          <ContentOverlay />
        </div>
      </div>
      <div class="content-section-footer"></div>
    </div>
  </MainLayout>
</template>

<style scoped>
.spacing {
  padding-top: 8px;
}

@media (min-width: 768px) {
  .spacing {
    padding-top: 1.5rem;
  }
}

.user-container {
  display: flex;
  align-items: center;
  padding-left: 1rem;
  padding-right: 1rem;
  max-width: 880px;
  width: 100vw;
}

@media (min-width: 768px) {
  .user-container {
    padding-left: 5rem;
    margin-left: 80px;
  }
}

@media (min-width: 1024px) {
  .user-container {
    margin-left: 0;
  }
}

.flex-container {
  display: flex;
  align-items: center;
}

@media (min-width: 768px) {
  .flex-container {
    justify-content: space-between;
  }
}

.profile-image {
  border-radius: 50%;
  object-fit: cover;
  width: 100px;
  cursor: pointer;
}

@media (min-width: 768px) {
  .profile-image {
    width: 200px;
  }
}

.hidden-input {
  display: none;
}

.user-profile {
  margin-left: 1.5rem;
  width: 100%;
}

.user-info {
  display: flex;
  margin-bottom: 1.25rem;
  align-items: center;
}
@media (min-width: 768px) {
  .user-info {
    margin-bottom: 2rem;
  }
}

.user-info .username {
  margin-right: 0.75rem;
  border-radius: 0.5rem;
  color: 22px;
}

@media (min-width: 768px) {
  .user-info .username {
    margin-right: 1.5rem;
  }
}

.user-info .edit-profile-icon {
  cursor: pointer;
}

.user-info button.edit-profile {
  display: none;
  padding: 0.25rem;
  padding-left: 1rem;
  padding-right: 1rem;
  border-radius: 0.5rem;
  font-weight: 800;
  background-color: #f3f4f6;
  color: 16px;
}

@media (min-width: 768px) {
  .user-info button.edit-profile {
    display: block;
    margin-right: 1.5rem;
  }
}

.user-info button.edit-profile:hover {
  background-color: #edf2f7;
}
.edit-profile-md {
  padding: 0.25rem;
  padding-left: 1rem;
  padding-right: 1rem;
  margin-right: 1.5rem;
  border-radius: 0.5rem;
  width: 100%;
  font-weight: 800;
  background-color: #f3f4f6;
  max-width: 260px;
  color: 17px;
}

@media (min-width: 768px) {
  .edit-profile-md {
    display: none;
  }
}

.edit-profile-md:hover {
  background-color: #e5e7eb;
}

.profile-actions button {
  display: block;
  margin-right: 1.5rem;
  max-width: 16.25rem;
  width: 100%;
  padding: 0.25rem;
  padding-left: 1rem;
  padding-right: 1rem;
  border-radius: 0.5rem;
  font-size: 17px;
  font-weight: 800;
  background-color: #f3f4f6;
}

.profile-actions button:hover {
  background-color: #edf2f7;
}

.user-stats-container {
  display: none;
}

@media (min-width: 768px) {
  .user-stats-container {
    display: block;
  }
}
.user-stats {
  display: flex;
  align-items: center;
  color: 18px;
}
.user-stats-container.show {
  display: block;
}

.user-stats-container .stat-item {
  margin-right: 1.5rem;
}
.stat-item span {
  font-weight: 800;
}

@media (min-width: 768px) {
  .profile-action-mobile {
    display: none;
  }
}
.profile-action-mobile-container {
  display: flex;
  margin-top: 2rem;
  justify-content: space-around;
  align-items: center;
  border-top-width: 1px;
  width: 100%;
}

.profile-action-stats {
  padding: 1rem;
}

.profile-stat-value {
  font-weight: 800;
  text-align: center;
}

.profile-stat-label {
  color: #9ca3af; /* text-gray-400 */
  font-weight: 600;
  margin-top: -0.375rem; /* -mt-1.5 */
  text-align: center;
}

.profile-action-footer {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-top: 1px solid #d1d5db; /* border-t-gray-300 */
}

.profile-action-button {
  padding: 1rem;
  width: 25%;
  display: flex;
  justify-content: center;
}

.profile-action-button.active {
  border-top: 1px solid #111827; /* border-t-gray-900 */
}
.content-section {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  width: 100%;
}
@media (min-width: 768px) {
  .content-section {
    padding-right: 0.375rem;
    padding-left: 90px;
  }
}
@media (min-width: 1024px) {
  .content-section {
    padding-left: 0;
  }
}

.content-section-header {
  display: none;
  margin-top: 2.5rem;
  border-top-width: 1px;
}
@media (min-width: 768px) {
  .content-section-header {
    display: block;
  }
}
.content-section-header .content-section-tabs {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #9ca3af;
  max-width: 600px;
  color: 15px;
}

.content-tab_active {
  display: flex;
  justify-content: center;
  align-items: center;
  border-top-width: 1px;
  border-top: 1px solid;
  width: 25%;
  font-weight: 800;
  padding: 17px;
}
.content-tab {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 25%;
  padding: 17px;
}
.tab-icon {
  margin-left: 2px;
  margin-bottom: -1px;
}

.tab-label {
  color: #111827;
  margin-left: 2px;
  margin-bottom: -1px;
}

.content-grid {
  display: grid;
  position: relative;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 0.25rem;
}
@media (min-width: 768px) {
  .content-grid {
    gap: 1rem;
  }
}
.content-section-footer {
  padding-bottom: 20px;
}
</style>