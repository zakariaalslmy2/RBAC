🔐 نظام التحكم في الوصول المعتمد على الأدوار (RBAC) في Laravel

مرحبًا بك في توثيق نظام إدارة المستخدمين والتحكم في الوصول القائم على الأدوار (RBAC)!
يُظهر هذا المشروع كيفية تنفيذ نظام RBAC متكامل في تطبيق Laravel — بما في ذلك نظام المصادقة، وإدارة الأدوار والصلاحيات، وحماية المسارات عبر الوسائط (Middleware)، واختبار واجهات الـ API.





المميزات

مصادقة المستخدمين — تسجيل الدخول، التسجيل، وإعادة تعيين كلمة المرور.

إدارة الأدوار — إنشاء الأدوار وتحديثها وتعيينها للمستخدمين.

إدارة الصلاحيات — تحكم دقيق في الوصول استنادًا إلى أدوار المستخدمين.

حماية المسارات بالوسائط (Middleware) — تقييد الوصول إلى المسارات حسب الأدوار والصلاحيات.

نقاط نهاية RESTful API — إدارة المستخدمين والأدوار والصلاحيات عبر واجهات برمجية.

اختبارات آلية — التحقق من الوظائف (مثل التأكد من أن المسؤول فقط يمكنه إنشاء الأدوار)


🛣️ واجهات برمجة التطبيقات (API Endpoints)

| الطريقة  | المسار         | دالة المتحكم                        | الوصف                       | الوصول                         |
| -------- | -------------- | ----------------------------------- | --------------------------- | ------------------------------ |
| **POST** | `/register`    | `AuthenticationController@register` | تسجيل مستخدم جديد           | عام                            |
| **POST** | `/login`       | `AuthenticationController@login`    | تسجيل الدخول وإنشاء رمز API | عام                            |
| **POST** | `/logout`      | `AuthenticationController@logout`   | تسجيل الخروج وإلغاء الرمز   | للمستخدمين المصادقين (Sanctum) |
| **GET**  | `/profile`     | `AuthenticationController@profile`  | عرض ملف المستخدم المسجل     | للمستخدمين المصادقين (Sanctum) |
| **GET**  | `/permissions` | `PermissionController@index`        | عرض جميع الصلاحيات          | للمستخدمين المصادقين (Sanctum) |


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
git clone https:
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
