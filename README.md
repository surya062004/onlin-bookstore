# Online Book Store

A Laravel-based online book store application.

## Requirements
- PHP 8.2+
- MySQL
- Composer

## Setup Instructions

1. Clone the repository
```bash
git clone https://github.com/surya062004/onlin-bookstore.git
```

2. Install dependencies
```bash
composer install
```

3. Copy .env file
```bash
cp .env.example .env
```

4. Configure database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookstore
DB_USERNAME=root
DB_PASSWORD=
5. Generate app key
```bash
php artisan key:generate
```

6. Run migrations
```bash
php artisan migrate
```

7. Seed admin user
```bash
php artisan db:seed --class=AdminSeeder
```

8. Start server
```bash
php artisan serve
```

## Admin Login
- Email: admin@bookstore.com
- Password: password123

## Features
- Home page with book listing
- Book search functionality
- Book detail page
- Admin dashboard
- Book CRUD (Add, Edit, Delete)
- Google Books API integration
- Responsive design with Bootstrap