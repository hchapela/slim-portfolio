# Slim portfolio
[Github repository](https://github.com/hchapela/slim-portfolio)

## What is this ?
This is a school project in order to learn to use Slim PHP, Twig & a Front framework.

## Features

* Back Office to add new experiences and projects
* Use of a database
* Secure connect system to admin pannel

## Install in local

You will first need to import your composers :
```
composer install
```

Then if you want to use gulp :
```
npm i
```


Then
```php
//Install DB
Import in PhpMyAdmin the database slim_try.sql

// Connect your database in app/settings.php 
$settings['db'] = [];
$settings['db']['host'] = 'localhost';
$settings['db']['port'] = '8889';
$settings['db']['user'] = 'root';
$settings['db']['pass'] = 'root';
$settings['db']['name'] = 'portfolio-slim';
```

## How to access to admin pannel ?

Go to /admin then try to login with :
* login : admin
* password : admin

## Contributing

### I started with the help of a boiler plate made by
* [Brunet Florian](https://github.com/FlorianB98/) & [Jules Guesnon](https://github.com/julesguesnon/)

