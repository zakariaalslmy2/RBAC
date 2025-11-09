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

👤 مسارات المستخدمين (User Routes)

| الطريقة       | المسار        | المتحكم                  | الوصف                 |
| ------------- | ------------- | ------------------------ | --------------------- |
| **GET**       | `/users`      | `UserController@index`   | عرض جميع المستخدمين   |
| **POST**      | `/users`      | `UserController@store`   | إنشاء مستخدم جديد     |
| **GET**       | `/users/{id}` | `UserController@show`    | عرض تفاصيل المستخدم   |
| **PUT/PATCH** | `/users/{id}` | `UserController@update`  | تحديث بيانات المستخدم |
| **DELETE**    | `/users/{id}` | `UserController@destroy` | حذف مستخدم            |

### 👤 User Routes
| Method | Route | Controller | Description |
|--------|--------|-------------|--------------|
| **GET** | `/users` | `UserController@index` | List all users |
| **POST** | `/users` | `UserController@store` | Create a new user |
| **GET** | `/users/{id}` | `UserController@show` | Show user details |
| **PUT/PATCH** | `/users/{id}` | `UserController@update` | Update user info |
| **DELETE** | `/users/{id}` | `UserController@destroy` | Delete a user |


🧑‍💼 مسارات الأدوار (Role Routes)



| الطريقة       | المسار        | المتحكم                  | الوصف              |
| ------------- | ------------- | ------------------------ | ------------------ |
| **GET**       | `/roles`      | `RoleController@index`   | عرض جميع الأدوار   |
| **POST**      | `/roles`      | `RoleController@store`   | إنشاء دور جديد     |
| **GET**       | `/roles/{id}` | `RoleController@show`    | عرض تفاصيل الدور   |
| **PUT/PATCH** | `/roles/{id}` | `RoleController@update`  | تحديث بيانات الدور |
| **DELETE**    | `/roles/{id}` | `RoleController@destroy` | حذف دور            |


### 🧑‍💼 Role Routes
| Method | Route | Controller | Description |
|--------|--------|-------------|--------------|
| **GET** | `/roles` | `RoleController@index` | List all roles |
| **POST** | `/roles` | `RoleController@store` | Create a new role |
| **GET** | `/roles/{id}` | `RoleController@show` | Show role details |
| **PUT/PATCH** | `/roles/{id}` | `RoleController@update` | Update role info |
| **DELETE** | `/roles/{id}` | `RoleController@destroy` | Delete a role |


 🔒 مسارات مبنية على الأدوار (Role-Based Routes)  
 | المسار             | الوصف              | الوصول       |
| ------------------ | ------------------ | ------------ |
| `/admin/dashboard` | لوحة تحكم المسؤول  | المسؤول فقط  |
| `/user/dashboard`  | لوحة تحكم المستخدم | المستخدم فقط |



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

الإعداد والتثبيت (Setup and Installation)

للبدء في استخدام النظام، اتبع الخطوات التالية:

استنساخ المستودع (Clone):

git clone https://github.com/Abdogoda/Laravel-Interview-Tasks/RBAC


تثبيت التبعيات (Dependencies):

cd RBAC
composer install


إعداد ملف البيئة (.env):
تأكد من ضبط متغيرات البيئة بشكل صحيح، خاصة إعدادات قاعدة البيانات.

cp .env.example .env
php artisan key:generate


ترحيل الجداول إلى قاعدة البيانات (Migrations):

php artisan migrate


تعبئة قاعدة البيانات (اختياري - Seeders):

php artisan db:seed


تشغيل التطبيق:

php artisan serve

🔧 أدوات التطوير (Development Tools)

Laravel 11+ — إطار عمل PHP الأساسي للتطبيق.

Laravel Sanctum — نظام مصادقة بسيط قائم على الرموز (Tokens).

SQLite — قاعدة بيانات خفيفة وسهلة الإعداد.

Postman — أداة لاختبار واجهات برمجة التطبيقات (APIs).
