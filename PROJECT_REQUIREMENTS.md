# Bangla Puzzle Limited - Mid Laravel Developer Assessment

## Project Overview

Build a simplified E-commerce Management Platform using Laravel.

The application must allow administrators to manage:

* Categories
* Subcategories
* Products

The project will be evaluated based on:

* Functionality correctness
* Laravel best practices
* Database design
* Code organization
* Validation
* CRUD implementation
* Documentation quality

---

# Technical Stack

## Required

* Laravel 12 (or latest stable version)
* PHP 8.2+
* MySQL
* Blade Templates
* Bootstrap 5
* Eloquent ORM

## Recommended

* Laravel Form Requests for validation
* Route Model Binding
* Resource Controllers
* Storage facade for image uploads
* Pagination

---

# Project Goals

Create a complete CRUD application for:

1. Categories
2. Subcategories
3. Products

Products must belong to:

* One Category
* One Subcategory

The application should provide:

* Create
* Read
* Update
* Delete

for all entities.

---

# Database Design

## Categories Table

Fields:

| Field      | Type          |
| ---------- | ------------- |
| id         | bigint        |
| name       | string        |
| slug       | string unique |
| created_at | timestamp     |
| updated_at | timestamp     |

---

## Subcategories Table

Fields:

| Field       | Type          |
| ----------- | ------------- |
| id          | bigint        |
| category_id | foreign key   |
| name        | string        |
| slug        | string unique |
| created_at  | timestamp     |
| updated_at  | timestamp     |

---

## Products Table

Fields:

| Field          | Type          |
| -------------- | ------------- |
| id             | bigint        |
| category_id    | foreign key   |
| subcategory_id | foreign key   |
| name           | string        |
| slug           | string unique |
| description    | text          |
| image          | string        |
| old_price      | decimal       |
| new_price      | decimal       |
| created_at     | timestamp     |
| updated_at     | timestamp     |

---

# Relationships

## Category Model

```php
Category hasMany Subcategory
Category hasMany Product
```

---

## Subcategory Model

```php
Subcategory belongsTo Category
Subcategory hasMany Product
```

---

## Product Model

```php
Product belongsTo Category
Product belongsTo Subcategory
```

---

# Functional Requirements

## Category Management

### Create Category

Users can:

* Add category name

System should:

* Validate required fields
* Generate slug automatically
* Save category

Validation:

```text
name:
- required
- unique
- max:255
```

---

### View Categories

Display:

* Name
* Slug
* Created Date
* Actions

Actions:

* Edit
* Delete

Use pagination.

---

### Edit Category

Users can:

* Update category name

Slug should update automatically.

---

### Delete Category

Users can delete categories.

Handle child records appropriately.

Preferred:

* Prevent deletion if subcategories/products exist
* Show validation message

---

# Subcategory Management

## Create Subcategory

Fields:

* Category
* Name

Requirements:

* Select parent category
* Generate slug automatically

Validation:

```text
category_id required
name required
```

---

## View Subcategories

Display:

* Name
* Category
* Slug
* Actions

Actions:

* Edit
* Delete

Use pagination.

---

## Edit Subcategory

Allow updating:

* Category
* Name

Update slug automatically.

---

## Delete Subcategory

Prevent deletion when products exist.

Display proper error message.

---

# Product Management

## Create Product

Fields:

* Category
* Subcategory
* Product Name
* Description
* Product Image
* Old Price
* New Price

Requirements:

* Upload image
* Store image using Laravel Storage
* Generate slug automatically

Validation:

```text
category_id required
subcategory_id required
name required
description required
image required
old_price numeric
new_price numeric
```

---

## View Products

Display:

* Product Image
* Product Name
* Category
* Subcategory
* Old Price
* New Price
* Actions

Requirements:

* Paginated table
* Search by product name
* Grouped by subcategory where applicable

---

## Product Details Page

Must use slug-based routing.

Example:

```text
/products/iphone-15-pro-max
```

Display:

* Product image
* Product name
* Category
* Subcategory
* Description
* Old price
* New price

---

## Edit Product

Allow updating:

* Category
* Subcategory
* Product Name
* Description
* Image
* Prices

Update slug automatically.

---

## Delete Product

Delete:

* Product record
* Associated image file

---

# Routing Requirements

Use Resource Controllers.

Example:

```php
Route::resource('categories', CategoryController::class);

Route::resource('subcategories', SubcategoryController::class);

Route::resource('products', ProductController::class);
```

Product details route:

```php
/products/{slug}
```

Use Route Model Binding when possible.

---

# Validation Requirements

Use Form Request classes.

Examples:

```text
StoreCategoryRequest
UpdateCategoryRequest

StoreSubcategoryRequest
UpdateSubcategoryRequest

StoreProductRequest
UpdateProductRequest
```

Validation logic should not be placed directly inside controllers.

---

# UI Requirements

## Dashboard Layout

Create a clean admin dashboard layout.

Navigation:

* Categories
* Subcategories
* Products

Use Bootstrap 5.

---

## Pages Required

### Categories

* List
* Create
* Edit

### Subcategories

* List
* Create
* Edit

### Products

* List
* Create
* Edit
* Details

---

# File Upload Requirements

Store uploads in:

```text
storage/app/public/products
```

Run:

```bash
php artisan storage:link
```

Display uploaded images properly.

---

# Slug Requirements

Use:

```php
Str::slug($name)
```

Generate slugs automatically during:

* Create
* Update

Ensure uniqueness.

Example:

```text
iphone-15-pro-max
samsung-s24-ultra
```

---

# Pagination Requirements

Use Laravel pagination.

Recommended:

```php
paginate(10)
```

Apply to:

* Categories
* Subcategories
* Products

---

# Search Requirements

Implement search on products page.

Search by:

* Product name

Optional:

* Category
* Subcategory

---

# Error Handling

Display friendly validation errors.

Use:

```php
@error()
```

Show success messages after:

* Create
* Update
* Delete

---

# Code Quality Requirements

Follow Laravel best practices.

Requirements:

* Resource Controllers
* Form Requests
* Eloquent Relationships
* Clean Blade templates
* Reusable layouts
* Proper folder structure
* No duplicated code

---

# Expected Folder Structure

```text
app/
├── Models/
│   ├── Category.php
│   ├── Subcategory.php
│   └── Product.php
│
├── Http/
│   ├── Controllers/
│   │   ├── CategoryController.php
│   │   ├── SubcategoryController.php
│   │   └── ProductController.php
│   │
│   └── Requests/
│       ├── StoreCategoryRequest.php
│       ├── UpdateCategoryRequest.php
│       ├── StoreSubcategoryRequest.php
│       ├── UpdateSubcategoryRequest.php
│       ├── StoreProductRequest.php
│       └── UpdateProductRequest.php
```

---

# Deliverables

The completed project must include:

* Full Category CRUD
* Full Subcategory CRUD
* Full Product CRUD
* Image Upload
* Slug Routing
* Validation
* Pagination
* Search
* Eloquent Relationships
* Clean UI

---

# AI Agent Instructions

Build the application incrementally in this order:

1. Create migrations
2. Create models and relationships
3. Create form requests
4. Create resource controllers
5. Create routes
6. Create blade layouts
7. Create category CRUD
8. Create subcategory CRUD
9. Create product CRUD
10. Implement image upload
11. Implement slug routing
12. Implement search
13. Implement pagination
14. Polish UI
15. Add documentation

Do not skip validation, relationships, slug generation, or image handling.

Use Laravel best practices throughout the project.
