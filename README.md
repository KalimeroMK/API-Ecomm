# API E-commerce in Laravel 9

- Admin roles, permission, polices
- Banner CRUD
- Brand CRUD
- Cart CRUD
- Category CRUD
- Coupon CRUD
- Message CRUD
- Newsletter CRUD
- Order CRUD
- Post CRUD
- Product CRUD
- Shipping CRUD
- Review CRUD
- Size CRUD
- Tag CRUD
- User CRUD
- Generate order in pdf form...
- Real time message & notification

## Payment

- Stripe
- Paypal
- Casys

## Set up :

1. Clone the repo and cd into it
2. composer install
3. Rename or copy .env.example file to .env
4. php artisan key:generate
5. Set your database credentials in your .env file
6. Run php artisan migrate:fresh --seed
7. run command[laravel file manager]:- php artisan storage:link
8. Edit .env file :- remove APP_URL
9. php artisan serve or use virtual host
10. Visit localhost:8000 in your browser
11. Visit /admin if you want to access the admin panel. Admin Email/Password: superadmin@mail.com/password. User
    Email/Password:
    client@mail.com/password
12. Test run: vendor/bin/phpunit

### Requirements installation and configuration for docker

* **Docker**
* **In project root run**: docker-compose up -d.
* **Install laravel packages**: composer install
* **ENV**: rename DB_HOST=127.0.0.1 to DB_HOST=mysql
* **Container ssh**: docker-compose exec app sh
* **Run migrations**: php artisan:migrate:fresh --seed.

### Postman collection

https://www.postman.com/collections/b867707ec228eff0cb1b
<p style="text-align:center">Thank You so much for your time !!!</p>

