
---

# 🔐 Login and Register Form in PHP with SQLite Database (CRUD Simulation)

## 📌 Project Overview
This project is a **Login and Register Form** built in **PHP**, connected to a **SQLite** database.  
It allows users to **register**, **log in**, and perform **full CRUD operations** (Create, Read, Update, Delete) on user accounts.  
The system saves important user details like **email**, **phone**, **username**, and **password** — without password hashing.

---

## 🛠️ Features

### 📝 Authentication System
- **Register New Users:** Collect Email, Phone, Username, and Password
- **Login Existing Users:** Verify Username and Password from database records

### 🗂️ User Management (CRUD)
- **Create:** Register (insert) a new user into the database
- **Read:** View all registered users and their information
- **Update:** Modify existing user details
- **Delete:** Remove a user from the database

---

## 📚 Technologies Used
- **PHP** (Core server-side language)
- **SQLite** (Embedded lightweight database)
- **HTML/CSS** (Form and page design)
- **PDO (PHP Data Objects)** (Secure connection to SQLite)

---

## 📋 Database Structure (SQLite)

| Field     | Type    | Description                    |
|-----------|---------|---------------------------------|
| id        | INTEGER | Primary Key (Auto Increment)    |
| email     | TEXT    | User’s email address (required) |
| phone     | TEXT    | User’s phone number (required)  |
| username  | TEXT    | User’s chosen username (required) |
| password  | TEXT    | User’s password (plain text, required) |

---

## 🧩 How to Run the Project

### 1. Requirements
- Install a local PHP server:
  - **XAMPP** (for PHP only — no MySQL needed)
  - OR
  - Use **PHP built-in server** (`php -S localhost:8000`)
- PHP version 7.4 or higher recommended

### 2. Setup
- Download or clone the project files.
- Place the project folder in your server’s root directory (e.g., `htdocs` for XAMPP).
- The `database.db` file will be automatically created if it doesn't exist.

### 3. Running the Project
- Open your browser.
- Navigate to:
  ```
  http://localhost/your-project-folder/
  ```
- You can now **Register**, **Login**, and manage user records.

---

## ⚡ Important Notes
- Passwords are saved **as plain text** (for simple simulation only).
- No MySQL server needed — only the SQLite file (`database.db`) is used.
- Make sure the `pdo_sqlite` extension is enabled in your PHP configuration (`php.ini`).

---

## 🎯 Future Improvements (Optional)
- Add **input validation** (to check email format, phone number, etc.)
- Set **unique constraint** on email and username
- Create **sessions** after successful login
- Build a **profile page** for logged-in users
- Improve **design** with frameworks like **Bootstrap**

---

> ✨ **Reminder:** This project is for learning/demo purposes. In real applications, password encryption should be added.

---
