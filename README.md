# Store

_Store is a website based on **[Laravel](https://laravel.com/)** framework for purchasing different products of different categories._

## Installation
After setting up your server or using your developing server, execute following commands line by line to have a fresh store project.
```
composer install
```
Compile the assets with mix:
```
yarn install
yarn run dev
```
`If you have no yarn on your system refer to the` [Install Yarn Page](https://classic.yarnpkg.com/en/docs/install#debian-stable)

Now migrate the tables:
```
php artisan migrate:fresh
```
You can seed the category and product table to have a better initial experience.
```
php artisan db:seed 
```
