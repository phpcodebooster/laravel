### Laravel Modular

If you are seeking for laravel feature where you can use modules in your application
which can be easily turn on/off then this is a good package for you.

### How to Install my package?

`composer require "phpcodebooster/laravel"` <br>
`php artisan vendor:publish`

### How to use this package?

Let us create an Admin module that can be turned on/off from your
laravel project

- create a directory called Admin  in "App/Modules" folder ex. app/Modules/Admin
- open config/modules.php file and add following line:

```php
return [
  'admin' => 'Admin Module'
];
```

That is it your module is now enabled for your project. Following will be the ideal
structure for your admin module

App<br>
  |-- Admin<br>
        |-- Controllers<br>
        |-- Views<br>
        |-- config.php<br>
        |-- routes.php
        
To access your module configuration use lowercase module name
Ex. 

```php
$admin_config = config('admin');
```

To use admin views in your controller use:

```php
return view('admin::index'); 
```

or

```php
return view('admin::folder.file'); 
```

### Sample Admin Module Code 

Create a folder called "Admin" in App/Modules 
Create directory called "Controllers" in App/Modules/Admin
Create directory called "Views" in App/Modules/Admin
Create a file called "routes.php" in App/Modules/Admin
Create a file called "config.php" in App/Modules/Admin

### Create Sample Route, Controller and View file

First, define a route in App/Modules/Admin/routes.php file as shown below:

```php
Route::get('/', 'HomeController@index')->name('home');
```

Secondly, create a file called "HomeController.php" in App/Modules/Admin/Controllers with following contents

```php
<?php

namespace App\Modules\Admin\Controllers;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        dd( config('modules') );
    }
}
```

Now, once we have folder and file structure defined we have to enable admin module:

open config/modules.php file and add following line:


```php
return [
    'admin' => 'Admin Panel'
];
```

Done, go to browser and hit your local website instance
