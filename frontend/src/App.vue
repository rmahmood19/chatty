<script setup>
import { ref } from 'vue'
import LoginForm from './components/auth/LoginForm.vue'
import Home from "@/components/Home.vue";

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
    <div v-else>
        <Home user=user @logout="handleLogout" />
    </div>
  </div>
</template>
