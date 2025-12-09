<script setup>
import { ref } from 'vue'

// Application state
const user = ref(null)
const showRegister = ref(false)

// Handle register switch
const switchToRegister = () => {
  showRegister.value = true
  // TODO: Create register component
  console.log('Switch to register')
}

</script>

<template>
  <div>
      <router-view></router-view>
  </div>
</template>
<style>
body {
    color: #ededec;
}
</style>
