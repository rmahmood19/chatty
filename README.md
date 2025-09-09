# Chatty - Real-time Chat Application

A simple real-time chat application built with Laravel backend and Vue.js frontend.

## Features
- Real-time messaging
- Group conversations
- Private messaging

## Project Structure

```
chatty/
├── backend/          # Laravel API 
├── frontend/         # Vue.js SPA
├── README.md
└── .gitignore
```

## Prerequisites

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL or SQLite
- NPM or Yarn

### 1. Set up Backend API
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

### 2. Set up Frontend SPA
```bash
cd frontend
npm install
npm run dev
```

## Real-time Features

The application uses **Laravel Echo** with **Pusher** for real-time functionality:
- Message broadcasting
- User presence channels
- Typing indicators
- Online status

## Technologies Used

### Backend
- **Laravel 12** - PHP framework
- **Laravel Sanctum** - SPA authentication
- **Laravel Echo** - Real-time broadcasting
- **Pusher** - WebSocket service
- **Laravel Herd** - Local development

### Frontend
- **Vue 3** - JavaScript framework
- **Vue Router** - Client-side routing
- **Vuex** - State management
- **Laravel Echo** - Real-time client


## License

This project is open-source and available under the [MIT License](LICENSE).
