<script setup>
import {onMounted, ref, shallowRef} from "vue";
import {userService} from "@/services/userService.js";
import api from "@/services/api.js";
import ConversationWindow from "@/components/ConversationWindow.vue";

const users = ref([])

const showConversation = ref(false);

const conversation = shallowRef(null);

onMounted(async () => {
  users.value = await userService.users()
})

const startConversation = (id) => {
  api.post('/api/conversations',
      {
        user_id: id
      }
  ).then(response => {
    conversation.value = response.data;
    showConversation.value = true;
    console.log('Conversation:', conversation.value, 'Show:', showConversation.value);

  }).catch(error => {
    console.error('Error starting conversation:', error);
  });
}

</script>

<template>
  <div>
    <h2 class="text-center text-3xl text-green-400">Users</h2>
    <div class="flex items-center justify-center">
      <div class="py-4 px-8 max-w-2xl" v-if="users">
        <div class="p-2 bg-zinc-900 mb-4 shadow-xl flex justify-between " v-for="user in users" :key="user.id">
          <div> {{ user.name }}</div>
          <div class="text-green-300 ml-16" @click="startConversation(user.id)">
            Chat
          </div>
        </div>
      </div>
    </div>
    <div v-if="conversation">
      <ConversationWindow :conversation="conversation" />
    </div>
  </div>
</template>

<style scoped>


</style>