import api from './api'

export const authService = {
  // Get CSRF token for SPA authentication
  async getCsrfCookie() {
    await api.get(`${import.meta.env.VITE_API_URL}/sanctum/csrf-cookie`)
  },

  // Login user
  async login(credentials) {
    await this.getCsrfCookie()
    const response = await api.post('/login', credentials)
    return response.data
  },

  // Register user
  async register(userData) {
    await this.getCsrfCookie()
    const response = await api.post('/auth/register', userData)
    return response.data
  },

  // Logout user
  async logout() {
    const response = await api.post('/auth/logout')
    return response.data
  },

  // Get authenticated user
  async getUser() {
    const response = await api.get('/api/user')
    return response.data
  },

  // Refresh user data
  async refreshUser() {
    try {
      const response = await api.get('/auth/user')
      return response.data
    } catch (error) {
      // User is not authenticated
      return null
    }
  }
}
