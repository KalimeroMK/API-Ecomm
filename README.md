# API E-commerce in  Laravel 9

## Features :

======= ADMIN =======

- Admin roles, permission
- Product manager
- Banner manager
- Order management
- Category management
- Brand management
- Shipping Management
- Review Management
- Blog, Category & Tag manager
- User Management
- Coupon Management
- System config: email setting, info shop, maintain status,...
- Generate order in pdf form...
- Real time message & notification

======= USER DASHBOARD =======

- Order management
- Review Management
- Comment Management
- Profile Settings

## Set up :

1. Clone the repo and cd into it
2. composer install
3. Rename or copy .env.example file to .env
4. php artisan key:generate
5. Set your database credentials in your .env file
6. Set your Braintree credentials in your .env file if you want to use PayPal
7. Run php artisan migrate:fresh --seed
8. npm install
9. npm run watch
10. run command[laravel file manager]:- php artisan storage:link
11. Edit .env file :- remove APP_URL
10. php artisan serve or use virtual host
11. Visit localhost:8000 in your browser
12. Visit /admin if you want to access the admin panel. Admin Email/Password: superadmin@mail.com/password. User
    Email/Password:
    client@mail.com/password

### Requirements installation and configuration for docker

* **Docker**
* **In project root run**: docker-compose up -d.
* **Install laravel packages**: composer install
* **ENV**: rename DB_HOST=127.0.0.1 to DB_HOST=mysql
* **Container ssh**: docker-compose exec app sh
* **Run migrations**: php artisan:migrate:fresh --seed.

<p style="text-align:center">Thank You so much for your time !!!</p>

