# CookShare — Recipe Management App

CookShare is a full-stack Laravel web application for creating, managing, and sharing recipes.  
Users can write detailed recipes with dynamic ingredient lists and step-by-step instructions,  
and browse other users’ creations.

---

## Features

- User authentication (register, log in, manage personal recipes)
- Image uploads for recipes
- Recipe editor for creating or updating recipes directly in the browser
- Database with persistent storage for users, recipes, ingredients, and pivot data

---

## Tech Stack

| Layer | Technology |
|-------|-------------|
| Backend | Laravel 12.30.1 (PHP 8.2.12) |
| Frontend | Blade, Vite, Vanilla JavaScript, Vanilla CSS |
| Database | MySQL (via XAMPP during dev) |
| Authentication | built-in Auth scaffolding |

---

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/removeris/cookshare.git
cd cookshare
```
### 2. Install Dependencies
```bash
composer install
npm install
```
### 3. Configure Environment
```bash
cp .env.example .env
```
### 4. Edit .env according to your DB credentials
```bash
DB_DATABASE=cookshare
DB_USERNAME=root
DB_PASSWORD=
```
### 5. Run Migrations
```bash
php artisan migrate
```
### 6. Start Servers (Laravel and Vite)
```bash
php artisan serve
npm run dev
```
### 7. Access locally
127.0.0.1:8000 or localhost:8000

