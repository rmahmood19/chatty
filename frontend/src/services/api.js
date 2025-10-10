import axios from 'axios'

// Create axios instance
const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL, // Use VITE_API_URL for consistency
  withCredentials: true,
    withXSRFToken:true,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  },
})

// Function to get XSRF token from cookie
function getXSRFToken() {
  const name = 'XSRF-TOKEN'
  const cookies = document.cookie.split(';')

  for (let cookie of cookies) {
    const [cookieName, cookieValue] = cookie.trim().split('=')
    if (cookieName === name) {
      return decodeURIComponent(cookieValue)
    }
  }
  return null
}

api.interceptors.request.use(
    (config) => {
      // Add XSRF token to requests that need it
      const token = getXSRFToken()
      if (token && ['post', 'put', 'patch', 'delete'].includes(config.method?.toLowerCase())) {
        config.headers['X-XSRF-TOKEN'] = token
      }
      return config
    },
    (error) => {
      return Promise.reject(error)
    }
)

// Response interceptor
api.interceptors.response.use(
    (response) => {
      return response
    },
    (error) => {
      if (error.response?.status === 401) {
        // Handle unauthorized access
        console.log('Unauthorized access')
      } else if (error.response?.status === 419) {
        // CSRF token mismatch
        console.log('CSRF token mismatch')
      }
      return Promise.reject(error)
    }
)

export default api