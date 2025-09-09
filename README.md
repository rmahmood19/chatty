# Chatty - Real-time Chat Application

A modern real-time chat application built with Laravel backend and Vue.js frontend.

## Features
- Real-time messaging
- User authentication
- Group conversations
- Private messaging
- Online user presence
- Message history

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
# Configure your database in .env
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

## API Endpoints

### Authentication
- `POST /api/v1/auth/register` - User registration
- `POST /api/v1/auth/login` - User login
- `POST /api/v1/auth/logout` - User logout
- `GET /api/v1/auth/user` - Get authenticated user

### Conversations
- `GET /api/v1/conversations` - Get user conversations
- `POST /api/v1/conversations` - Create new conversation
- `GET /api/v1/conversations/{id}` - Get conversation details

### Messages
- `GET /api/v1/conversations/{id}/messages` - Get conversation messages
- `POST /api/v1/conversations/{id}/messages` - Send message

## Real-time Features

The application uses **Laravel Echo** with **Pusher** for real-time functionality:
- Message broadcasting
- User presence channels
- Typing indicators
- Online status

## Technologies Used

### Backend
- **Laravel 12** - PHP framework
- **Laravel Sanctum** - API authentication
- **Laravel Echo** - Real-time broadcasting
- **Pusher** - WebSocket service

### Frontend
- **Vue 3** - JavaScript framework
- **Vue Router** - Client-side routing
- **Pinia** - State management
- **Axios** - HTTP client
- **Laravel Echo** - Real-time client

## Environment Variables

### Backend (.env)
```env
APP_URL=http://localhost:8000
FRONTEND_URL=http://localhost:5173

BROADCAST_DRIVER=pusher
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_key
PUSHER_APP_SECRET=your_secret
PUSHER_APP_CLUSTER=mt1

SANCTUM_STATEFUL_DOMAINS=localhost:5173
```

### Frontend (.env)
```env
VITE_API_BASE_URL=http://localhost:8000/api/v1
VITE_PUSHER_APP_KEY=your_key
VITE_PUSHER_APP_CLUSTER=mt1
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is open-source and available under the [MIT License](LICENSE).
