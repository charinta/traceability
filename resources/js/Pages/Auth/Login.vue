<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  username: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<template>
  <div class="soft-ui-box p-6">
    <h1>Login</h1>
    <form @submit.prevent="login">
      <div>
        <label for="username">Username</label>
        <input id="username" type="text" v-model="username" required autofocus>
      </div>

      <div>
        <label for="password">Password</label>
        <input id="password" type="password" v-model="password" required>
      </div>

      <div>
        <button type="submit">Login</button>
      </div>
    </form>
    <p>Don't have an account?</p>
    <p>
      Register <a :href="route('register')">Register</a>
    </p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: '',
      password: '',
    };
  },
  methods: {
    login() {
      // Logic untuk mengirim data login menggunakan username dan password
      this.$inertia.post(route('login'), {
        username: this.username,
        password: this.password,
      });
    },
  },
};
</script>

<style src="login.css" lang="css" />