<script setup>

import {ref} from "vue";
import { authService } from "@/services/authService";
import {useRouter} from "vue-router";
import useAuthStore from "@/stores/authStore.js";


const form = ref({
    email: '',
    password: ''
})

const auth = useAuthStore();

const router = useRouter();

const handleLogin = async () => {
    loading.value = true;
    error.value = '';
    validationErrors.value = [];

    await auth.login(form.value.email, form.value.password)

    console.log(auth.user)

    if (auth.user) {
        loading.value = false;
        await router.push('/')
    }
}

const loading = ref(false);
const error = ref('');
const validationErrors = ref([]);

</script>

<template>
    <div class="min-h-screen bg-zinc-950 flex items-center justify-center p-4">
        <div class="border border-lime-600  shadow-2xl p-8 w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-lime-300 mb-2">Welcome to Chatty</h2>
                <p class="text-lime-100">Sign in to start chatting</p>
            </div>

            <!-- Login Form -->
            <form @submit.prevent="handleLogin" class="space-y-6">
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-lime-300 mb-2">
                        Email
                    </label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        placeholder="Enter your email"
                        required
                        :disabled="loading"
                        class=" autofill-dark text-lime-300 w-full px-4 py-3 border border-gray-300 outline-none

            transition duration-200"
                    />
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-lime-300 mb-2">
                        Password
                    </label>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        placeholder="Enter your password"
                        required
                        :disabled="loading"
                        class="autofill-dark text-lime-300 w-full px-4 py-3 border border-gray-300 transition duration-200 disabled:bg-gray-50 disabled:cursor-not-allowed"
                    />
                </div>

                <!-- Error Messages -->
                <div v-if="error" class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    {{ error }}
                </div>

                <!-- Validation Errors -->
                <div v-if="validationErrors.length > 0" class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside space-y-1">
                        <li v-for="error in validationErrors" :key="error" class="text-sm">{{ error }}</li>
                    </ul>
                </div>

                <!-- Login Button -->
                <button
                    type="submit"
                    :disabled="loading"
                    class="w-full bg-gradient-to-r from-lime-600 via-lime-300 to-lime-600
          hover:from-lime-700 hover:via-lime-400 hover:to-lime-700
          text-zinc-900 font-semibold py-3 px-4
          transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none"
                >
          <span v-if="loading" class="flex items-center justify-center">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Logging in...
          </span>
                    <span v-else>Login</span>
                </button>
            </form>

            <!-- Register Link -->
            <div class="mt-8 text-center">
                <p class="text-gray-600">
                    Don't have an account?
                    <button
                        @click="$emit('switch-to-register')"
                        class="text-blue-600 hover:text-blue-700 font-medium hover:underline focus:outline-none focus:underline"
                    >
                        Register here
                    </button>
                </p>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>