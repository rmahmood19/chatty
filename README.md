# Chatty - Real-time Chat Application

A modern real-time chat application built with Laravel backend and Vue.js frontend.

## Features
- Real-time messaging
- Group conversations
- Private messaging
- 
## Project Structure

```
chatty/
├── backend/          # Laravel API (Port 8000)
├── frontend/         # Vue.js SPA (Port 5173)
├── README.md
└── .gitignore
```

## Prerequisites

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL or SQLite
- NPM or Yarn

## Quick Start

### Backend Setup (Laravel)
```bash
cd backend
cp .env.example .env
## Update necessary environment variables in .env file
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

### Frontend Setup (Vue.js)
```bash
cd frontend
npm install
npm run dev
```

## Development

### Backend (Laravel API)
- **URL**: http://localhost:8000
- **API Base**: http://localhost:8000/api/v1
- **Database**: SQLite (development) / MySQL (production)

### Frontend (Vue.js SPA)
- **URL**: http://localhost:5173
- **Framework**: Vue 3 with Composition API
- **Build Tool**: Vite
- **Styling**: CSS3 / Tailwind CSS (optional)

## Real-time Features

The application uses **Laravel Echo** with **Pusher** for real-time functionality:
- Message broadcasting
- User presence channels
- Typing indicators
- Online status

## Technologies Used

### Backend
- **Laravel 12**
- **Laravel Sanctum** - API authentication
- **Laravel Echo** - Real-time broadcasting
- **Pusher** - WebSocket service

### Frontend
- **Vue 3** - JavaScript framework
- **Vue Router** - Client-side routing
- **Vuex** - State management
- **Laravel Echo** - Real-time client
- 
## License

This project is open-source and available under the [MIT License](LICENSE).
