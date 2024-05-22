<script setup>
import { ref, reactive } from "vue";
import { router } from "@inertiajs/vue3";

import Close from "vue-material-design-icons/Close.vue";
import ArrowLeft from "vue-material-design-icons/ArrowLeft.vue";
import MapMarkerOutline from "vue-material-design-icons/MapMarkerOutline.vue";
import ChevronDown from "vue-material-design-icons/ChevronDown.vue";

// const user = usePage().props.auth.user
const emit = defineEmits(["close"]);
const form = reactive({
  text: null,
  file: null,
});

let isValidFile = ref(null);
let fileDisplay = ref("");
let textarea = ref("");
let error = ref({
  text: null,
  file: null,
});

const createPostFunc = () => {
  error.value.text = null;
  error.value.file = null;

  router.post("/posts", form, {
    forceFormData: true,
    preserveScroll: true,
    onError: (errors) => {
      errors && errors.text ? (error.value.text = errors.text) : "";
      errors && errors.file ? (error.value.file = errors.file) : "";
    },
    onSuccess: () => {
      closeOverlay();
    },
  });
};

const getUploadedImage = (e) => {
  form.file = e.target.files[0];
  let extention = form.file.name.substring(form.file.name.lastIndexOf(".") + 1);

  console.log(extention);

  if (extention == "png" || extention == "jpg" || extention == "jpeg") {
    isValidFile.value = true;
  } else {
    isValidFile.value = false;
    return;
  }

  fileDisplay.value = URL.createObjectURL(e.target.files[0]);
  setTimeout(() => {
    document
      .getElementById("TextAreaSection")
      .scrollIntoView({ behavior: "smooth" });
  }, 300);
};

const closeOverlay = () => {
  form.text = null;
  form.file = null;
  fileDisplay.value = "";
  emit("close");
};
</script>

<template>
  <div id="OverlaySection" class="overlay-section">
    <button class="overlay-button right-3" @click="closeOverlay()">
      <Close :size="27" fillColor="#FFFFFF" />
    </button>

    <div class="overlay-container">
      <div class="header">
        <ArrowLeft :size="30" fillColor="#000000" @click="closeOverlay()" />
        <div class="title">New reel</div>
        <button @click="createPostFunc()" class="button">Share</button>
      </div>

      <div class="card-container">
        <div class="inner-container">
          <div v-if="!fileDisplay" class="file-placeholder">
            <label for="file" class="file-label"> Select From Computer </label>
            <input id="file" type="file" @input="getUploadedImage($event)" />
            <div v-if="error && error.file" class="error-message">Error</div>
            <div
              v-if="!fileDisplay && isValidFile === false"
              class="error-message"
            >
              File not accepted
            </div>
          </div>

          <img
            v-if="fileDisplay && isValidFile === true"
            class="image-display"
            :src="fileDisplay"
          />
        </div>

        <div id="TextAreaSection">
          <div class="textarea-header">
            <div class="user-info">
              <img class="user-avatar" src="" alt="user-avatar" />
              <div class="user-name">User name</div>
            </div>
          </div>

          <div v-if="error && error.text" class="error-text">Error</div>

          <div class="text-area-container">
            <textarea
              ref="textarea"
              v-model="form.text"
              placeholder="Write caption..."
              rows="10"
              class="text-area"
            ></textarea>
          </div>

          <div class="section">
            <div class="section-title">Add Location</div>
            <MapMarkerOutline :size="27" />
          </div>

          <div class="section">
            <div class="section-title">Accesibility</div>
            <ChevronDown :size="27" />
          </div>

          <div class="section">
            <div class="section-title">Advanced Settings</div>
            <ChevronDown :size="27" />
          </div>

          <div class="footer-text">
            Your reel will be shared with your followers in their feeds and can
            be seen on your profile. It may also appear in places such as Reels,
            where anyone can see it.
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.overlay-section {
  position: fixed;
  z-index: 50;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.6);
  padding: 0.75rem;
}
.overlay-button {
  background-color: transparent;
  border: none;
  right: 2rem;
  position: absolute;
  cursor: pointer;
}
.overlay-container {
  max-width: 72rem;
  height: calc(100% - 100px);
  margin: 2.5rem auto;
  background-color: white;
  border-radius: 0.75rem;
  overflow: hidden;
}
.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  border-top-left-radius: 0.75rem;
  border-top-right-radius: 0.75rem;
  padding: 0.75rem;
  border-bottom: 1px solid #d1d5db;
}

.header .title {
  font-size: 1.125rem;
  font-weight: 800;
}

.header .button {
  margin-right: 1rem;
  border: none;
  font-size: 1.125rem;
  color: #3b82f6;
  font-weight: 800;
  transition: color 0.2s;
}

.header .button:hover {
  cursor: pointer;
  color: #111827;
}
.card-container {
  width: 100%;
  display: flex;
  height: calc(100% - 55px);
  border-radius: 0.75rem;
  overflow: auto;
}

.inner-container {
  display: flex;
  align-items: center;
  background-color: #f3f4f6;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.file-placeholder {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-left: auto;
  margin-right: auto;
}
.file-placeholder input {
  display: none;
}
.file-label {
  background-color: #3b82f6;
  border-radius: 0.5rem;
  padding: 0.625rem;
  color: white;
  font-weight: 800;
  cursor: pointer;
  transition: background-color 0.2s;
}

.file-label:hover {
  background-color: #2563eb;
}

.error-message {
  color: #ef4444;
  text-align: center;
  padding: 0.5rem;
  font-weight: 800;
}

.image-display {
  min-width: 400px;
  padding: 1rem;
  margin-left: auto;
  margin-right: auto;
}
#TextAreaSection {
  max-width: 720px;
  width: 100%;
  position: relative;
}

.textarea-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.75rem;
}

.user-info {
  display: flex;
  align-items: center;
}

.user-avatar {
  border-radius: 50%;
  width: 38px;
  height: 38px;
}

.user-name {
  margin-left: 1rem;
  font-weight: 800;
  font-size: 15px;
}

.error-text {
  color: #ef4444;
  padding: 0.5rem;
  font-weight: 800;
}

.text-area-container {
  display: flex;
  width: 100%;
  max-height: 200px;
  background-color: white;
  border-bottom: 1px solid #d1d5db;
}

.text-area {
  width: 100%;
  border: none;
  margin-top: 0.5rem;
  margin-bottom: 0.5rem;
  z-index: 50;
  outline: none;
  color: #4b5563;
  font-size: 18px;
  resize: none;
}

.section {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.75rem;
  border-bottom: 1px solid #d1d5db;
}

.section-title {
  font-size: 1.125rem;
  font-weight: 800;
  color: #6b7280;
}

.footer-text {
  color: #6b7280;
  margin-top: 0.75rem;
  padding: 0.75rem;
  font-size: 0.875rem;
}
</style>