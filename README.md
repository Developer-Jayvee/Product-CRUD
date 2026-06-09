# Product & Order Management System

A simple Laravel-based application for managing products and orders with full CRUD functionality and relational database structure.

---

## 🚀 Features

* Create, read, update, and delete products
* Create and manage orders linked to products
* Enable/disable products using status field
* Relationship handling (One-to-Many)
* Factory and Seeder support for dummy data
* API-ready structure

---

## 🛠️ Tech Stack

* Laravel 
* MySQL  (Database)
* PHP 8+

---

## ⚙️ Installation

1. Clone the repository:

```bash
git clone https://github.com/Developer-Jayvee/Product-CRUD.git
```

2. Install dependencies:

```bash
composer install
```

3. Copy environment file:

```bash
cp .env.example .env
```

4. Generate app key:

```bash
php artisan key:generate
```

5. Run migrations:

```bash
php artisan migrate
```

 Seed dummy data:

```bash
php artisan db:seed
```

---

## ▶️ Running the Project

```bash
php artisan serve
```

Visit:

```
http://127.0.0.1:8000
```

