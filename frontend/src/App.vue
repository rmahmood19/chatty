<script setup>
import { ref } from 'vue'
import LoginForm from './components/auth/LoginForm.vue'
import HOmeOld from "@/components/HOme-old.vue";

// Application state
const user = ref(null)
const showRegister = ref(false)

// Handle successful login
const handleLoginSuccess = (data) => {
  user.value = data.user
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
      <router-view></router-view>
<!--    &lt;!&ndash; Show Login Form if user is not logged in &ndash;&gt;-->
<!--    <LoginForm -->
<!--      v-if="!user" -->
<!--      @login-success="handleLoginSuccess"-->
<!--      @switch-to-register="switchToRegister"-->
<!--    />-->
<!--    -->
<!--    &lt;!&ndash; Show Chat Interface if user is logged in &ndash;&gt;-->
<!--    <div v-else>-->
<!--        <HOmeOld user=user @logout="handleLogout" />-->
<!--    </div>-->
  </div>
</template>
<style>
body {
    color: #ededec;
}
</style>
