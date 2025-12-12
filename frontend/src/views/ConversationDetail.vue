<script setup>

import {useRoute} from "vue-router";
import {onMounted, onUnmounted, ref} from "vue";
import apiService from "@/services/apiService.js";

import { useEcho } from "@laravel/echo-vue";

const route = useRoute();

const conversationId = route.params.id;

const inputMessage = ref('');

const messages = ref([]);

let channel = null;

const handleSendMessage = () => {
    if (inputMessage.value.trim() === '') {
        return;
    }

    apiService.post(`/conversations/${conversationId}/messages`,
        {
            content: inputMessage.value
        }).then((response) => {

    });

    inputMessage.value = '';
}

// Simple hook call - works with any Laravel broadcasting driver
const { leaveChannel, stopListening, listen } = useEcho(
    `conversation.${conversationId}`,
    "ConversationMessageReceived",
    (e) => {

        messages.value.push(e)
        console.log('msg', e);
    }
);

onMounted(() => {
    listen()
})

onUnmounted(() => {
    if (channel) {
       leaveChannel()
    }
})
</script>

<template>

    <div>
        <div v-if="messages">
            <div v-for="message in messages" :key="message.id" class="mb-2 p-2 border border-gray-200 rounded">
                <p class="text-sm text-gray-600 mb-1">User ID: {{ message.user_id }} | Sent at: {{ message.created_at }}</p>
                <p class="text-base">{{ message.body }}</p>

            </div>
        </div>
        <div>
            <form @submit.prevent="handleSendMessage()">
                <input v-model="inputMessage"
                       type="text" placeholder="Type your message..."
                       class="border border-gray-300 rounded px-2 py-1 w-full"/>
                <button>Send</button>
            </form>

        </div>
    </div>

</template>

<style scoped>

</style>