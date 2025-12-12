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

const loadConversation = () => {
    apiService.get(`/conversations/${conversationId}`)
        .then((response) => {
            messages.value = response.data.messages;
        });
}

onMounted(() => {
    listen()
    loadConversation()
})

onUnmounted(() => {
    if (channel) {
       leaveChannel()
    }
})
</script>

<template>

    <div class="h-screen flex flex-col ">

        <!-- Top Header (Fixed) -->
        <header class="h-14 flex items-center px-4 shadow z-10">
            <h1 class="text-lg font-semibold"># general</h1>
        </header>

        <!-- Messages Scroll Area -->
        <main class="flex-1 overflow-y-auto px-4 py-4 space-y-4">
            <div v-if="messages">
                <div class="flex space-x-3 bg-zinc-800 rounder mt-2 pt-2 px-2 rounded" v-for="message in messages" :key="message.id">
                    <img class="w-10 h-10 rounded-full border border-green-300" src="https://i.pravatar.cc/40?img=1">
                    <div>
                        <div class="font-semibold">{{ message.sender.display_name }} <span class="text-sm text-gray-500">10:24 AM</span></div>
                        <p class="text-green-100">{{ message.content }}</p>
                    </div>
                </div>
            </div>


        </main>

        <!-- Sticky Message Input -->
        <footer class="bg-zinc-950 border-t p-3 sticky bottom-0">
            <div class="flex items-center space-x-3">
                <input
                    type="text"
                    v-model="inputMessage"
                    placeholder="Message #general"
                    class="flex-1 border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:border-blue-400"
                />
                <button @click="handleSendMessage" class="hover:bg-green-700 border border-green-600 text-white px-4 py-2 rounded-lg">
                    Send
                </button>
            </div>
        </footer>

    </div>


</template>

<style scoped>

</style>