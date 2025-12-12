import {authClient} from "@/services/authService.js";
import { configureEcho } from "@laravel/echo-vue";

configureEcho({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    withCredentials: true,
    authorizer: (channel, options) => {
        return {
            authorize: (socketId, callback) => {
                authClient.post('broadcasting/auth', {
                    socket_id: socketId,
                    channel_name: channel.name
                })
                    .then(response => {
                        callback(false, response.data);
                    })
                    .catch(error => {
                        callback(true, error);
                    });
            }
        };
    },
});