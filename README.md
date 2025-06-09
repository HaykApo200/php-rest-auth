# PHP JWT Authentication API

A secure RESTful API built with pure PHP using JWT (JSON Web Tokens) for authentication. It includes user registration, login, token validation — all inside a Dockerized environment using PHP, MySQL, and NGINX.

---

## 🚀 Features

- ✅ User Registration (Signup)
- 🔐 User Login with JWT Token
- 🔒 Access to Protected Routes via JWT
- 🐳 Docker support (PHP, NGINX, MySQL)
- ⚙️ Organized OOP Structure 
- 📦 Dependency management via Composer

---

## 🛠️ Technologies Used

- PHP 8.3 (FPM)
- MySQL
- PDO
- [firebase/php-jwt](https://github.com/firebase/php-jwt)
- Docker & Docker Compose
- NGINX
- Composer

---

## 📁 Project Structure

```
project/
│
├── app/
│   ├── Controllers/       
│   ├── Models/
│   ├── config/             
│   ├── Services/          
│   └── Exceptions/        
│
├── public/
│   ├── index.html         
│   ├── login.html         
│   └── js/
│       ├── login.js
│       ├── signup.js
│   └── api/
│       ├── login.php
│       ├── signup.php
│       └── protected.php
|
├── scripts/
│    └── create_users_tablse.sql
|
├── nginx/
│    └── default.conf 
│
├── vendor/
├── docker-compose.yml
├── Dockerfile
├── composer.lock
├── composer.json
├── phpcs.xml
└── README.md
```

---

## ⚙️ Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/HaykApo200/php-rest-auth.git
cd php-rest-auth
```

### 2. Start Docker containers

```bash
docker-compose up -d --build
```

### 3. Install dependencies (inside container)

```bash
docker exec -it php bash
composer install
```

### 4. Dump autoload (if you add new namespaces/classes)

```bash
composer dump-autoload
```

---

