
import axios from 'axios'

// Create axios instance
export const authClient = axios.create({
  baseURL: import.meta.env.VITE_BASE_URL, // Use VITE_API_URL for consistency
  withCredentials: true,
  withXSRFToken:true,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  },
})

export const authService = {
  // Get CSRF token for SPA authentication
  async getCsrfCookie() {
    await authClient.get(`/sanctum/csrf-cookie`)
  },

  async login(email, password) {
    await this.getCsrfCookie()
    const response = await authClient.post('/login', {
      email: email,
      password: password})
    return response.data
  },

  async register(userData) {
    await this.getCsrfCookie()
    const response = await authClient.post('/auth/register', userData)
    return response.data
  },

  async logout() {
    await this.getCsrfCookie()
    const response = await authClient.post('/logout')
    return response.data
  },

}
