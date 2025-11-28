# TeckTok - Twitter-style Web Application

## Project Description and Purpose
TeckTok is a Twitter-style web application built using Laravel and Tailwind CSS. The purpose of this project is to allow users to post short messages ("tweets"), view a feed of all tweets, and interact with tweets through likes. This application is designed for learning full-stack development, focusing on Laravel, Blade components, Tailwind CSS, and basic JavaScript for interactivity.

---

## Features Implemented
- User registration and authentication using Laravel Breeze
- Post tweets with a character limit (280 characters)
- View a feed of all tweets in reverse chronological order
- Like/unlike tweets with live update using AJAX
- Character counter for tweets
- Responsive design with dark theme
- Blade components for reusable UI elements

---

## Installation Instructions
1. Clone the repository:
    ```bash
    git clone https://github.com/lilciddump-pixel/midterm.git
    cd midterm
    ```
2. Install PHP dependencies:
    ```bash
    composer install
    ```
3. Install Node.js dependencies (for Tailwind CSS):
    ```bash
    npm install
    npm run dev
    ```
4. Create a `.env` file:
    ```bash
    cp .env.example .env
    ```
5. Generate application key:
    ```bash
    php artisan key:generate
    ```
6. Run the local development server:
    ```bash
    php artisan serve
    ```
7. Open your browser and navigate to `http://127.0.0.1:8000`

---

## Database Setup Steps
1. Create a new MySQL database (example: `laravel`) using phpMyAdmin, MySQL Workbench, or the MySQL CLI.
2. Update your `.env` file with your database credentials:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```
3. Run database migrations:
    ```bash
    php artisan migrate
    ```
4. (Optional) Seed the database with sample data:
    ```bash
    php artisan db:seed
    ```

---

## Screenshots of the Application

### Log In
(screenshots/tweet_feed.png)

### Tweet Page
(screenshots/create_tweet.png)

### Edit Profile Page
(screenshots/like_tweet.png)

---

## Credits
- **AI Assistance**: OpenAI ChatGPT (GPT-5-mini) was used to help with:
  - Code debugging
  - UI/UX design suggestions
  - JavaScript logic for character counter and AJAX likes
  - Tailwind CSS layout improvements
- **Frameworks & Tools**:
  - Laravel (PHP)
  - Tailwind CSS
  - Alpine.js (if used for interactive components)
  - MySQL (database)

---
