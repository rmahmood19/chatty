import apiService from "@/services/apiService.js";

export const userService = {

    async getUsers() {
        const response = await apiService.get('/users');
        return response.data;
    },

    async getLoggedInUser() {
        const response = await apiService.get('/user');
        return response.data;
    }
}