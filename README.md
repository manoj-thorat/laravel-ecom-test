# 🛒 Laravel Ecommerce API with Admin Panel

A simple Laravel-based ecommerce backend with product management, cart functionality, and Razorpay checkout — including admin dashboard and RESTful APIs.

---

## 📦 Features

- Laravel 11 + Breeze Auth
- Admin Dashboard (sidebar layout)
- Product CRUD with multiple image upload
- RESTful API for:
  - Product listing
  - Cart add/update/delete/list
  - Checkout (Razorpay integration)
  - Orders listing and viewing
- Razorpay integration with local DB order record
- Exception handling and clean API responses
- Seeders for testing products and users

---

## 🚀 Tech Stack

- PHP 8.2+
- Laravel 11
- MySQL 8+
- Laravel Breeze
- Razorpay SDK
- Postman (API testing)

---

## ⚙️ Setup Instructions

### 1. Clone the Project

```bash
1. Clone Project
git clone https://github.com/your-username/ecommerce-laravel.git
cd ecommerce-laravel

2. Install Dependencies
composer install
npm install && npm run build

3. Setup project
cp .env.example .env
php artisan key:generate

Update .env database credentials:
DB_DATABASE=laravelecom
DB_USERNAME=root
DB_PASSWORD=yourpassword

4. You can either run migrations and seeders:
php artisan migrate:fresh --seed

Or import the SQL backup:

5. Set your Razorpay keys in .env:
RAZORPAY_KEY=your_key_id
RAZORPAY_SECRET=your_key_secret

6. Run the Server
php artisan serve

Access Admin Panel: http://localhost:8000/login