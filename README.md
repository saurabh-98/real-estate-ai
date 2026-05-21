# 🏡 Real Estate AI

A modern AI-powered Real Estate web application built using Laravel 12 with premium responsive UI, advanced property management system, AJAX enquiry module, AI integration, and interactive user experience.

---

# 📌 Project Overview

Real Estate AI is a complete real estate platform developed for modern property management and seamless user interaction.

The application allows users to:

- Browse premium properties
- Search and filter listings
- View detailed property information
- Send enquiries using AJAX-powered forms
- Experience a fully responsive and interactive UI

The admin panel provides complete property management capabilities including CRUD operations, featured properties, and enquiry management.

---

# 🚀 Key Features

## 🌐 Frontend Features

- Responsive Homepage
- Property Listing Page
- Property Details Page
- AJAX Enquiry Form
- SweetAlert2 Notifications
- Interactive Modal UI
- Property Search & Filters
- Price Range Filtering
- Related Properties Section
- Advanced Responsive Layout
- Modern UI/UX Design

---

## 🔐 Admin Features

- Secure Authentication
- Admin Dashboard
- Property CRUD Operations
- Featured Property Management
- Property Status Management
- Enquiry Management

---

## 🤖 AI Features

- AI Description Generator
- OpenAI API Integration

---

# ⚙️ Tech Stack

| Technology | Version |
|------------|---------|
| PHP | 8.2+ |
| Laravel | 12 |
| MySQL | Latest |
| Bootstrap | 5 |
| jQuery | 3+ |
| SweetAlert2 | Latest |

---

# 💻 System Requirements

Before installation, ensure your system has:

- PHP 8.2+
- Composer
- MySQL
- Git
- XAMPP / WAMP / Laragon

---

# 📂 Project Structure

```plaintext
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
vendor/
```

---

# 📦 Installation Guide

## Step 1 — Clone Repository

```bash
git clone https://github.com/saurabh-98/real-estate-ai.git
```

---

## Step 2 — Open Project Directory

```bash
cd real-estate-ai
```

---

## Step 3 — Install Composer Dependencies

```bash
composer install
```

---

## Step 4 — Create Environment File

### Windows

```bash
copy .env.example .env
```

### Linux / Mac

```bash
cp .env.example .env
```

---

## Step 5 — Generate Application Key

```bash
php artisan key:generate
```

---

## Step 6 — Configure Database

Update `.env` file with your database credentials:

```env
APP_NAME="Real Estate AI"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=real_estate_ai
DB_USERNAME=root
DB_PASSWORD=
```

---

## Step 7 — Configure OpenAI API Key

Add your OpenAI API Key inside `.env`

```env
OPENAI_API_KEY=your_openai_api_key
```

Generate API Key from:

https://platform.openai.com/api-keys


---

## Step 8 — Create Database

Create a database manually in phpMyAdmin:

```plaintext
real_estate_ai
```

---

## Step 9 — Run Database Migrations

```bash
php artisan migrate
```

---

## Step 10 — Run Database Seeder

```bash
php artisan db:seed
```

OR

```bash
php artisan migrate:fresh --seed
```

---

## Step 11 — Create Storage Link

```bash
php artisan storage:link
```

---

## Step 12 — Start Development Server

```bash
php artisan serve
```

---

# 🌐 Application URLs

## Frontend

```plaintext
http://127.0.0.1:8000
```

---

## Admin Dashboard

```plaintext
http://127.0.0.1:8000/admin/dashboard
```

---

## Login

```plaintext
http://127.0.0.1:8000/login
```

---

# 🔑 Admin Credentials

```plaintext
Email: admin@gmail.com
Password: password
```

---

# ⚡ AJAX Enquiry System

Features included:

- AJAX Form Submission
- SweetAlert2 Notifications
- Frontend Validation
- Backend Validation
- Dynamic Error Handling
- Responsive Modal UI

---

# 🎨 UI/UX Highlights

- Glassmorphism Design
- Gradient Effects
- Interactive Hover Animations
- Premium Property Cards
- Responsive Modal Design
- Mobile Optimized Layouts

---

# 🔒 Security Features

- CSRF Protection
- Laravel Validation
- Secure AJAX Requests
- Authentication System
- Input Sanitization

---

# 📱 Responsive Design

Fully responsive across:

- Desktop
- Laptop
- Tablet
- Mobile Devices

---

# 📂 Important Artisan Commands

## Clear Cache

```bash
php artisan optimize:clear
```

---

## Route List

```bash
php artisan route:list
```

---

## Run Migration

```bash
php artisan migrate
```

---

## Run Seeder

```bash
php artisan db:seed
```

---

## Start Server

```bash
php artisan serve
```

---

# 🧪 Project Testing Checklist

- Homepage Working
- Property Listing Working
- Property Details Working
- AJAX Enquiry Working
- Admin Dashboard Working
- CRUD Operations Working
- Responsive Design Working
- AI Description Generator Working

---

# 🚀 Future Enhancements

- AI Property Recommendation
- Google Maps Integration
- Wishlist System
- Payment Gateway
- Property Booking
- User Dashboard
- Advanced Analytics

---

# 👨‍💻 Developed By

## Saurabh Jha

GitHub:
https://github.com/saurabh-98

---

# 📄 License

This project is developed for assessment and educational purposes.

---

# 🙌 Acknowledgement

Thank you for reviewing this project.