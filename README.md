# Velora Fashion

A full-stack, single-vendor fashion e-commerce web application built with Laravel, designed for the Pakistani fashion market. The platform offers a complete shopping experience from product browsing to order confirmation.

## Features

- User Authentication: Secure registration, login, and email verification using Laravel Breeze
- Product Catalog: Browse products across multiple categories including abayas, bags, accessories, clothing, and footwear
- Category and Subcategory Filtering: Refined product discovery for a better shopping experience
- Shopping Cart: Session-based cart management
- Checkout and Orders: Complete checkout flow with order confirmation
- Admin Panel: Role-based dashboard for managing categories, subcategories, and products, including full CRUD operations and image upload

## Tech Stack

- Backend: PHP, Laravel
- Frontend: Blade, Bootstrap 5, JavaScript
- Database: MySQL
- Version Control: Git and GitHub

## Getting Started

Clone the repository and set up the project locally:

```bash
git clone https://github.com/70167744-dev/velora-fashion.git
cd velora-fashion
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
