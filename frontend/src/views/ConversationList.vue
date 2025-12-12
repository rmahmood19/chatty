<script setup>

import {computed, onBeforeUnmount, onMounted, ref} from "vue";

import apiService from "@/services/apiService.js";
import useAuthStore from "@/stores/authStore.js";

const conversations = ref([]);

const authStore = useAuthStore();

const user = ref(authStore.user);

const calculateConversationList = computed(() => {

    return conversations.value.map((conversation) => {
        const otherUser = conversation.users.find((u) => u.id !== user.value.id);
        return {...conversation, otherUser};
    })

})


// onMounted(() => {
//     // window.Echo.channel('my-channel')   // for public
//     //     .listen('MessageSent', (e) => {
//     //         console.log(e)
//     //         messages.value.push(e);
//     //     });
//
// });

onBeforeUnmount(() => {
    // window.Echo.leave('my-channel');
});

onMounted(() => {
    apiService.get('/conversations').then((response) => {
        conversations.value = response.data;
    });
});
</script>

<template>
    <div class="text-green-200">
        <h3 class="text-center font-bold text-3xl text-green-500">Conversations</h3>
        <div v-if="conversations" class="p-4">
            <router-link v-for="conversation in calculateConversationList"
                         :to="{name: 'ConversationDetail', params: { id: conversation.id }}"
                         :key="conversation.id">
                <div class="mb-4 px-4 py-2 border border-green-300">
                    <h2 class="text-xl font-bold mb-2 text-green-400">
                        {{ conversation.otherUser.display_name }}
                    </h2>
                </div>
            </router-link>
        </div>

    </div>
</template>

<style scoped>

</style>