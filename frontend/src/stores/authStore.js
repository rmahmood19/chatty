import {defineStore} from "pinia";
import {ref} from "vue";
import {authService} from "@/services/authService.js";
import {userService} from "@/services/userService.js";

const useAuthStore = defineStore('auth', () => {
    const user = ref(null);

    const getUser = async () => {
        try {
            user.value = await userService.getLoggedInUser();
        } catch {
            user.value = null;
        }
    }

    const login = async (email, password) => {
        try {
            user.value = await authService.login(email, password);
        } catch (err) {
            console.error("Login failed:", err);
        }
    }

    const logout = async () => {
        try {
            await authService.logout();
            user.value = null;
        } catch (err) {
            console.error("Logout failed:", err);
        }
    }

    return {user, getUser, login, logout}
})

export default useAuthStore;