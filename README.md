
# 🛍️ Mad Colors – Full Stack E-Commerce Web Application

![PHP](https://img.shields.io/badge/PHP-Backend-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-Frontend-purple)
![License](https://img.shields.io/badge/License-Educational-green)

Mad Colors is a fully functional E-Commerce web application developed for an online clothing store.  
The system delivers a complete digital shopping experience including authentication, product management, shopping cart, wishlist functionality, invoice generation, and an admin management dashboard.

This project demonstrates full-stack web development skills using PHP, MySQL, and Bootstrap.

---

## 📌 Project Overview

Mad Colors is designed to simulate a real-world online shopping platform.  
It includes both **customer-facing features** and an **administrative control panel**, ensuring smooth product and order management.

The system follows a modular structure separating frontend, backend logic, and database operations.

---

## ✨ Key Features

### 👤 Customer Module
- Secure User Registration & Login
- Email Verification using PHPMailer
- Product Browsing by Categories
- Product Search & Sorting
- Add to Cart / Remove from Cart
- Wishlist Management
- Checkout Process
- Automatic Invoice Generation
- Order History Tracking

### 🔐 Admin Module
- Secure Admin Authentication
- Add / Update / Delete Products
- Category Management
- Image Upload Handling
- View & Manage Customer Orders
- User Management System

---

## 🛠️ Technology Stack

| Layer        | Technology Used |
|--------------|----------------|
| Frontend     | HTML, CSS, Bootstrap, JavaScript |
| Backend      | PHP |
| Database     | MySQL |
| Email System | PHPMailer |
| Server       | Apache (XAMPP/WAMP) |

---

## 🏗️ System Architecture

- Client-Server Web Architecture
- MVC-like structured PHP logic
- Modular folder organization
- Relational Database Design (MySQL)

---

## 📂 Project Structure

| Folder/File | Description |
|-------------|-------------|
| admin/      | Admin dashboard and controls |
| assets/     | CSS, JS, images |
| includes/   | Backend logic & DB connection |
| uploads/    | Product images |
| vendor/     | PHPMailer dependencies |
| index.php   | Home page |
| config.php  | Database configuration |

---

## ⚙️ Installation & Setup Guide

### 1️⃣ Requirements
- XAMPP / WAMP
- PHP 7+
- MySQL
- Web Browser

### 2️⃣ Setup Steps

1. Clone the repository: git clone https://github.com/yourusername/Mad-Colors-Ecommerce-Website.git
   
2. Move project folder to: C:/xampp/htdocs/
   
3. Start Apache & MySQL from XAMPP

4. Create a new database in phpMyAdmin: mad_colors

5. Import the provided SQL file into the database.

6. Update database configuration:

```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mad_colors";
```

7. Open in browser: http://localhost/mad-colors

🔒 Security Features

Password authentication system

Input validation

Session management

Secure admin access control

🎯 Learning Outcomes

This project demonstrates:

Full-stack web development

CRUD operations with PHP & MySQL

Database integration

Session handling & authentication

Email integration using PHPMailer

Admin dashboard development

Real-world e-commerce workflow implementation





