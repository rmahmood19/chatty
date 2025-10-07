<script setup>
import { ref } from 'vue'
import LoginForm from './components/LoginForm.vue'

// Application state
const user = ref(null)
const showRegister = ref(false)

// Handle successful login
const handleLoginSuccess = (data) => {
  user.value = data.user
  console.log('User logged in:', data.user)
  console.log(data.message)
}

// Handle register switch
const switchToRegister = () => {
  showRegister.value = true
  // TODO: Create register component
  console.log('Switch to register')
}

// Handle logout
const handleLogout = () => {
  user.value = null
  console.log('User logged out')
}
</script>

<template>
  <div>
    <!-- Show Login Form if user is not logged in -->
    <LoginForm 
      v-if="!user" 
      @login-success="handleLoginSuccess"
      @switch-to-register="switchToRegister"
    />
    
    <!-- Show Chat Interface if user is logged in -->
    <div v-else class="min-h-screen bg-gray-100">
      <!-- Simple logged-in state for now -->
      <div class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between items-center py-4">
            <h1 class="text-2xl font-bold text-gray-900">Chatty</h1>
            <div class="flex items-center space-x-4">
              <span class="text-gray-700">Welcome, {{ user.name || user.email }}!</span>
              <button
                @click="handleLogout"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200"
              >
                Logout
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Chat content area -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow p-8 text-center">
          <h2 class="text-xl font-semibold text-gray-800 mb-4">🎉 Login Successful!</h2>
          <p class="text-gray-600 mb-4">You are now logged in to Chatty.</p>
          <p class="text-sm text-gray-500">Chat interface will be implemented next...</p>
        </div>
      </div>
    </div>
  </div>
</template>
