<script setup>

import {onBeforeUnmount, onMounted, ref} from "vue";

const messages = ref([]);

onMounted(() => {
    window.Echo.channel('my-channel')   // for public
        .listen('MessageSent', (e) => {
            console.log(e)
            messages.value.push(e);
        });
});

onBeforeUnmount(() => {
    window.Echo.leave('my-channel');
});

</script>

<template>
    <ul class="text-green-200">
        <li v-for="m in messages" :key="m.id">
            {{ m.message }}
        </li>
    </ul>

</template>

<style scoped>

</style>