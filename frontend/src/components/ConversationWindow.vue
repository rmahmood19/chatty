<script setup>

import {computed, onMounted, ref} from "vue";
import apiService from "@/services/apiService.js";

const messages = ref([])
// ...
const messagesList = computed(() => messages.value);

const props = defineProps({
  conversation: {
    type: Object,
    required: true
  }
})

onMounted(() => {

  apiService.get(`/api/conversations/${props.conversation.id}/messages`)
      .then((response) => {
        messages.value = response.data

      })
      .catch((error) => {
        console.error('Error fetching messages:', error);
      });
})

const handleMessageSend = (event) => {
  event.preventDefault();
  const messageInput = document.getElementById('message');
  const messageContent = messageInput.value.trim();

  if (messageContent === '') {
    return; // Don't send empty messages
  }

  // Send the message to the server
  apiService.post(`/api/conversations/${props.conversation.id}/messages`, {
    content: messageContent
  }).then((response) => {
    // Clear the input field
    messageInput.value = '';
  }).catch((error) => {
    console.error('Error sending message:', error);
  });
}

</script>

<template>
  <div>
    <div v-if="messagesList.length > 0" class="px-4 py-2 max-w-2xl mx-auto bg-zinc-800">
      <div v-for="message in messagesList" :key="message.id">
        <div class="bg-zinc-900 p-4 my-2 rounded shadow">
          <div class="text-xs mb-2 text-green-300">{{ message.sender.name }}</div>
          <div>{{ message.content }}</div>
        </div>

      </div>

      <div class="z-50 border-t backdrop-blur

       border-neutral-800/80 bg-neutral-900/70">
        <div class="mx-auto w-full ">
          <form id="composer" class="flex items-end gap-2 rounded border border-gray-200  p-2 shadow-sm transition focus-within:border-gray-300 dark:border-neutral-800 dark:bg-neutral-950/80 dark:focus-within:border-neutral-700" autocomplete="off">

            <!-- Expanding textarea -->
            <label class="sr-only" for="message">Message</label>
            <textarea id="message" name="message" rows="1" placeholder="Send a message…" class="max-h-40 w-full resize-none overflow-y-auto bg-transparent p-3 text-sm leading-6 placeholder-gray-400 focus:outline-none dark:placeholder-neutral-500" spellcheck="true"></textarea>

            <!-- Send button -->
            <button type="submit"
                    @click="handleMessageSend"
                    class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded
            bg-gray-900 text-white transition active:scale-[0.98] hover:opacity-90 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-300 disabled:cursor-not-allowed disabled:opacity-40 dark:bg-white dark:text-black dark:focus-visible:ring-neutral-700">
              <!-- Send icon (paper plane) -->
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" class="h-5 w-5">
                <path d="m22 2-7 20-4-9-9-4Z"/>
                <path d="M22 2 11 13"/>
              </svg>
            </button>
          </form>
        </div>
      </div>
    </div>
    <div v-else class="text-green-200">No messages yet</div>
  </div>
</template>


<style scoped>

</style>