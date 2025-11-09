# 🔐 Laravel RBAC (Role-Based Access Control) System

Welcome to the **User Management and Role-Based Access Control (RBAC)** documentation!  
This project demonstrates how to implement a complete RBAC system in a **Laravel** application — including authentication, role and permission management, middleware protection, and API testing.

---

## 📋 Task Requirements

For detailed requirements and evaluation criteria, please check the file:
> [`TaskRequirements.md`](TaskRequirements.md)


## 🧩 Features

- **User Authentication** — Login, registration, and password reset functionality.  
- **Role Management** — Create, update, and assign roles to users.  
- **Permissions** — Fine-grained access control based on user roles.  
- **Middleware Protection** — Restrict access to routes by roles and permissions.  
- **RESTful API Endpoints** — Manage users, roles, and permissions through APIs.  
- **Automated Tests** — Ensure functionality (e.g., that only admins can create roles).

---

## 🛣️ API Endpoints

| Method | Route | Controller Method | Description | Access |
|--------|--------|------------------|--------------|---------|
| **POST** | `/register` | `AuthenticationController@register` | Register a new user | Public |
| **POST** | `/login` | `AuthenticationController@login` | Log in and generate an API token | Public |
| **POST** | `/logout` | `AuthenticationController@logout` | Log out and invalidate the token | Authenticated (Sanctum) |
| **GET** | `/profile` | `AuthenticationController@profile` | Get the authenticated user’s profile | Authenticated (Sanctum) |
| **GET** | `/permissions` | `PermissionController@index` | List all permissions | Authenticated (Sanctum) |

### 👤 User Routes
| Method | Route | Controller | Description |
|--------|--------|-------------|--------------|
| **GET** | `/users` | `UserController@index` | List all users |
| **POST** | `/users` | `UserController@store` | Create a new user |
| **GET** | `/users/{id}` | `UserController@show` | Show user details |
| **PUT/PATCH** | `/users/{id}` | `UserController@update` | Update user info |
| **DELETE** | `/users/{id}` | `UserController@destroy` | Delete a user |

### 🧑‍💼 Role Routes
| Method | Route | Controller | Description |
|--------|--------|-------------|--------------|
| **GET** | `/roles` | `RoleController@index` | List all roles |
| **POST** | `/roles` | `RoleController@store` | Create a new role |
| **GET** | `/roles/{id}` | `RoleController@show` | Show role details |
| **PUT/PATCH** | `/roles/{id}` | `RoleController@update` | Update role info |
| **DELETE** | `/roles/{id}` | `RoleController@destroy` | Delete a role |

### 🔒 Role-Based Routes
| Route | Description | Access |
|--------|--------------|--------|
| `/admin/dashboard` | Admin dashboard | Admin Only |
| `/user/dashboard` | User dashboard | User Only |

---
```
🗂️ Project Structure

RBAC/

├── app/
│   ├── Enums/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/V1/
│   │   │   │   ├── UserController.php
│   │   │   │   ├── AuthenticationController.php
│   │   │   │   ├── PermissionController.php
│   │   │   │   └── RoleController.php
│   │   ├── Middleware/
│   │   │   ├── HasAnyPermissionMiddleware.php
│   │   │   └── ...
│   ├── Models/
│   │   ├── User.php
│   │   ├── Role.php
│   │   ├── Permission.php
│   ├── Providers/
│   └── ...
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 2025_08_10_210607_create_roles_table.php
│   │   ├── 2025_08_10_210613_create_permissions_table.php
│   │   ├── 2025_08_10_210732_create_role_user_table.php
│   │   ├── 2025_08_10_210750_create_permission_role_table.php
│   │   └── 2025_08_10_210800_create_permission_user_table.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   ├── RolePermissionSeeder.php
│   │   └── ...
├── routes/
│   ├── api.php
│   ├── web.php
│   └── ...
├── tests/
│   ├── Feature/
│   │   ├── API/
│   │   │   ├── V1/
│   │   │   │   ├── UserTest.php
│   │   │   │   ├── RoleTest.php
│   │   │   │   └── ...
│   ├── Unit/
│   └── ...
├── README.md
├── composer.json
├── package.json
├── phpunit.xml
└──
...
```

🛠️ Setup and Installation
To get started with this system, follow these installation steps:

1. Clone the repository:
git clone https://github.com/Abdogoda/Laravel-Interview-Tasks/RBAC
2. Install dependencies:
cd RBAC
composer install
3. Set up the .env file:
Make sure you have the correct environment variables set in your .env file, especially the database connection.

cp .env.example .env
php artisan key:generate
4. Migrate the database:
Run the migration commands to set up the necessary tables for users, roles, and permissions.

php artisan migrate
5. Seed the database (optional):
You can seed the database with default roles and permissions.

php artisan db:seed
6. Serve the application:
php artisan serve
🔧 Development Tools
Laravel 11+: PHP framework for building the application.
Laravel Sanctum: Simple token-based authentication for APIs.
SQLite: Lightweight database used for easy setup.
Postman: For testing API endpoints.
