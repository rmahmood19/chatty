import axios from 'axios'

// Create axios instance
const apiService = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
    withCredentials: true,
    withXSRFToken:true,
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
  },
})

export default apiService