# E-commerce Management Platform

A Laravel-based E-commerce Management Platform for managing categories, subcategories, and products.

## Features

- Category Management (CRUD)
- Subcategory Management (CRUD)
- Product Management (CRUD)
- Image Upload for Products
- Slug-based Product Routing
- Search Products by Name
- Pagination on All List Pages
- Dynamic Subcategory Dropdown via AJAX
- Validation Using Form Request Classes
- Bootstrap 5 UI
- MySQL Database

## Tech Stack

- Laravel 12
- PHP 8.2+
- MySQL
- Bootstrap 5
- Blade Templates
- Eloquent ORM

## Installation

1. Clone the repository
2. Install dependencies:
   ```bash
   composer install
   ```

3. Configure `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bpcareer_task
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Create database:
   ```bash
   mysql -u root -e "CREATE DATABASE IF NOT EXISTS bpcareer_task;"
   ```

5. Run migrations:
   ```bash
   php artisan migrate
   ```

6. Create storage link:
   ```bash
   php artisan storage:link
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

8. Visit http://127.0.0.1:8000

## Routes

- `/` - Redirects to Categories
- `/categories` - Categories list
- `/categories/create` - Create category
- `/categories/{category}` - Show category
- `/categories/{category}/edit` - Edit category
- `/subcategories` - Subcategories list
- `/subcategories/create` - Create subcategory
- `/subcategories/{subcategory}` - Show subcategory
- `/subcategories/{subcategory}/edit` - Edit subcategory
- `/products` - Products list with search
- `/products/create` - Create product
- `/products/{slug}` - Show product by slug
- `/products/{product}/edit` - Edit product
- `/api/subcategories/{category}` - Get subcategories by category (AJAX)

## Database Schema

### Categories
- id
- name
- slug (unique)
- timestamps

### Subcategories
- id
- category_id (foreign key)
- name
- slug (unique)
- timestamps

### Products
- id
- category_id (foreign key)
- subcategory_id (foreign key)
- name
- slug (unique)
- description
- image
- old_price
- new_price
- timestamps

## Author

Built for Bangla Puzzle Limited - Mid Laravel Developer Assessment
