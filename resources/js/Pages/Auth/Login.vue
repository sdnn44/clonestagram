<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Log in" />

    <img width="200" src="/logo-default.png" />

    <form @submit.prevent="submit">
      <div>
        <TextInput
          id="email"
          type="email"
          class="text-input"
          v-model="form.email"
          required
          autofocus
          autocomplete="username"
          placeholder="Email"
        />
        <InputError class="input-error" :message="form.errors.email" />
      </div>

      <div class="label-spacing">
        <TextInput
          id="password"
          type="password"
          class="text-input"
          v-model="form.password"
          required
          autocomplete="current-password"
          placeholder="Password"
        />
        <InputError class="input-error" :message="form.errors.password" />
      </div>

      <PrimaryButton
        class="primary-button"
        :class="{ processing: form.processing }"
        :disabled="form.processing"
      >
        Log in
      </PrimaryButton>

      <div class="password-container">
        <a
          v-if="canResetPassword"
          :href="route('password.request')"
          class="link-reset-password"
        >
          Forgot your password?
        </a>
      </div>

      <div class="password-container">
        Don't have an account?
        <a
          v-if="canResetPassword"
          :href="route('register')"
          class="link-sign-up"
        >
          Sign up
        </a>
      </div>
    </form>
  </GuestLayout>
</template>

<style scoped>
img {
  padding-top: 2rem;
  padding-bottom: 2.5rem;
  margin-left: auto;
  margin-right: auto;
}
.text-input {
  margin-top: 0.25rem;
  display: block;
  width: 100%;
  padding: 0.5rem;
  border-radius: 10px;
}

.input-error {
  margin-top: 0.5rem;
}

.input-container {
  margin-top: 1rem;
}

.primary-button {
  margin-top: 1rem;
}

.primary-button.processing {
  opacity: 0.25;
}
.password-container {
  display: flex;
  margin-top: 1rem;
  justify-content: center;
  align-items: center;
}

.link-reset-password {
  font-size: 0.875rem;
  color: #4a5568;
  border-radius: 0.375rem;
  outline: none;
}

.link-reset-password:hover {
  color: #1a202c;
}

.link-reset-password:focus {
  outline: 2px solid transparent;
  box-shadow: 0 0 0 2px #6366f1, 0 0 0 4px rgba(255, 255, 255, 0.5);
}

.link-sign-up {
  padding-left: 0.25rem;
  font-weight: bold;
  color: #2563eb;
  border-radius: 0.375rem;
  outline: none;
}

.link-sign-up:focus {
  outline: 2px solid transparent;
  box-shadow: 0 0 0 2px #6366f1, 0 0 0 4px rgba(255, 255, 255, 0.5);
}
.label-spacing {
  margin-top: 1rem;
}
</style>
