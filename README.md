
# Task Management System

## Overview

This repository contains a **Task Management System** developed with **Laravel**. The system allows users to manage their tasks efficiently with features such as authentication, CRUD operations, task filtering/sorting, and API functionality.  

---

## Features

### 1. **User Authentication**
- Users can **register**, **log in**, and **log out** securely using Laravel's authentication system.

### 2. **Task Management (CRUD Operations)**
- **Create**: Add new tasks with a title and due date.
- **Read**: View a list of tasks assigned to the user.
- **Update**: Edit task details.
- **Delete**: Remove tasks from the system.

### 3. **Task Filtering and Sorting**
- Filter tasks by **status**: Pending, In Progress, Completed.
- Sort tasks by **due date** to prioritize work.

### 4. **API Integration**
- Fully functional API endpoints for seamless interaction with the application.
- API supports all CRUD operations for tasks.
- Endpoints are secured with Laravel Sanctum.

---

## Installation and Setup

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL or other supported database
- Laravel 10.x
- Postman (for API testing, optional)

### Steps
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/SyMihad/Task-Management-System-Laravel-API.git
   cd task-management
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Environment Setup**:
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update `.env` with your database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=task_management
     DB_USERNAME=root
     DB_PASSWORD=your_password
     ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seed Database**:
   ```bash
   php artisan migrate
   ```

6. **Run the Application**:
   ```bash
   php artisan serve
   ```

7. **Access the Application**:
   Visit `http://localhost:8000` in your web browser.

---

## API Endpoints

### **Authentication**
- `POST /api/login`: Login a user.
- `POST /api/register`: Register a new user.
- `POST /api/logout`: Logout a user.

### **Tasks**
- `GET /api/tasks`: Get all tasks.
- `POST /api/tasks`: Create a new task.
- `GET /api/tasks/{id}`: Retrieve a specific task.
- `PUT /api/tasks/{id}`: Update an existing task.
- `DELETE /api/tasks/{id}`: Delete a task.

---

## Testing the API

### Using Postman:
1. **Authentication**:
   - Register a new user via `POST /api/register`.
   - Log in using `POST /api/login` to get an access token.
2. **Task Management**:
   - Use the access token to perform CRUD operations on `/api/tasks`.
