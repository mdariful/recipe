[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)
##How to install

#Install composer:

```sh
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

#Clone repository:

```sh
$ git clone https://github.com/mdariful/recipe.git
```

#Set your database

Copy and than modify .env.example in .env and configure it with your database access configuration

#Set you server to point on public directory

For security reason and url problem set your server directory to point public directory on this application

#Follow this command line instruction:

```sh
$ composer update
$ php artisan migrate
$ php artisan db:seed --class=UsersTableSeeder
```

Generate a New application key

```sh
$ php artisan key:generate
```

Now you can enjoy your application. 

On the first Login change your credential as Admin

First login credential is:

email: admin@mail.com

password: admin

If you get any issue please open a issue so i can follow you and solve the problem.

Made with all the Love of the World.
