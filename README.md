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

`
return [
  'admin' => 'Admin Module'
];
`
That is it your module is now enabled for your project. Following will be the ideal
structure for your admin module

App
  |-- Admin
        |-- Controllers
        |-- Views
        |-- config.php
        |-- routes.php
        
To access your module configuration use lowercase module name
Ex. 

`$admin_config = config('admin');`

To use admin views in your controller use:

`return view('admin::index'); `

or

`return view('admin::folder.file'); `        