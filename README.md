# Store

_Store is a website based on **[Laravel](https://laravel.com/)** framework for purchasing different products of different categories._

## Installation
clone from github by executing following command:
```git clone https://github.com/ThisPR/Store.git```

After cloning, run following command to install required packages:
```
composer install
```

After populating your database, rename the `.env.example` file to `.env` and add your database credentials into it.

Run following command to generate app key:
`php artisan key:generate`

Migrate the required tables into database:
```$xslt
php artisan migrate
```
you can seed your database to have a better initial experience by running:
```$xslt
php artisan db:seed
```
Now you can view sample products by running `php artisan serve` or setting up a server and redirect it to **public** folder.
More information about setting up a production server can be found in [laravel documentation](https://laravel.com/docs/6.x/installation#web-server-configuration).

You can view products, but if you want to view your shopping cart or add a product into it, you must
sign up first.

If you want to access to admin panel, you should go to `http://{your_domain}/admin` it redirects 
you to admin login page if you are not logged in as an admin. 

For compiling the assets with mix, run following commands:
```
yarn install
yarn run dev
```
`If you have no yarn on your system refer to the` [Install Yarn Page](https://classic.yarnpkg.com/en/docs/install#debian-stable)
