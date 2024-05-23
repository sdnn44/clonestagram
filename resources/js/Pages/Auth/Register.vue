<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Register" />
    <img width="200" src="/logo-default.png" />

    <form @submit.prevent="submit">
      <div>
        <TextInput
          id="name"
          type="text"
          class="text-input"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
          placeholder="Name"
        />
        <InputError class="input-error" :message="form.errors.name" />
      </div>

      <div class="input-container">
        <TextInput
          id="email"
          type="email"
          class="text-input"
          v-model="form.email"
          required
          autocomplete="username"
          placeholder="E-mail"
        />
        <InputError class="input-error" :message="form.errors.email" />
      </div>

      <div class="input-container">
        <TextInput
          id="password"
          type="password"
          class="text-input"
          v-model="form.password"
          required
          autocomplete="new-password"
          placeholder="Password"
        />
        <InputError class="input-error" :message="form.errors.password" />
      </div>

      <div class="input-container">
        <TextInput
          id="password_confirmation"
          type="password"
          class="text-input"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
          placeholder="New password"
        />
        <InputError
          class="input-error"
          :message="form.errors.password_confirmation"
        />
      </div>

      <PrimaryButton
        class="primary-button"
        :class="{ processing: form.processing }"
        :disabled="form.processing"
      >
        Register
      </PrimaryButton>
      <div class="form-footer">
        <Link :href="route('login')" class="link"> Already registered? </Link>
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
}

.input-error {
  margin-top: 0.5rem;
}

.input-container {
  margin-top: 1rem;
}

.form-footer {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  margin-top: 1rem;
}

.link {
  text-decoration: underline;
  font-size: 0.875rem;
  color: #4a5568;
  border-radius: 0.375rem;
  outline: none;
}

.link:hover {
  color: #1a202c;
}

.link:focus {
  outline: 2px solid transparent;
  box-shadow: 0 0 0 2px #6366f1, 0 0 0 4px rgba(255, 255, 255, 0.5);
}

.primary-button {
  margin-top: 2rem;
  margin-left: 1rem;
}

.primary-button.processing {
  opacity: 0.25;
}
</style>