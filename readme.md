# Proj_Slim



## What is this ?
This is a Slim/Twig template to use in light project with a mecanic of blocks.

## Features

* gestion of page with blocks and expend
* Use of a database

## Install in local

You will first need to import your composers :
```
composer install
```

Then
```php
//Install DB
Import in PhpMyAdmin the database slim_try.sql

// Connect your database in app/settings.php 
$settings['db'] = [];
$settings['db']['host'] = 'localhost';
$settings['db']['port'] = '';
$settings['db']['user'] = 'root';
$settings['db']['pass'] = '';
$settings['db']['name'] = 'slim_try';
```



## How to do new page

Go in the file "route" and define the page and the url (all your php logic will be in this file):

```php
$app
    ->get(
        '/', //your url here
        function($request, $response)
        {
            // View data (data you want in your page)
            $viewData = [];

            return $this->view->render($response, 'pages/home.twig', $viewData); //the file page you will use for the front
        }
    )
    ->setName('home')
;
```

## How do the base/expend/use works

Your file "route" call a file in the folder "pages" where you define your componnent like "content". They will next push those block in "base". You can call exterior blocks with "use".



## Contributing
* Brunet Florian
* Bruno Simon

### With the help
* Jules Guesnon


Donc forget to tag and to follow the github :ok_hand:
