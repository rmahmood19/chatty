import api from "@/services/api.js";

export const userService = {

    async users() {
        const response = await api.get('/api/users');
        return response.data;
    }

}