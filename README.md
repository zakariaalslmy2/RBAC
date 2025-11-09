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

## 📚 API Documentation

You can import the Postman collection from:
