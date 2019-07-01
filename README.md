# Laravel-dusk-automation
> Laravel Dusk was one of the new features introduced in Laravel 5.4. Dusk is a tool for application testing.Laravel Dusk is a powerful browser automation tool for Laravel. With Dusk you can programmatically test your own applications or visit any website on the internet using a real Chrome browser. By default, Dusk does not require you to install JDK or Selenium on your machine. Instead, Dusk uses a standalone Chromedriver. 

## Laravel Installation
> To begin create a new Laravel project

```composer create-project --prefer-dist laravel/laravel Laravel-dusk-automation```

## Install dusk in your laravel project

```composer require --dev laravel/dusk``` then
```php artisan dusk:install```

Once you install dusk you can see dusk files in ->tests\Browser directory.

## Running Tests
To run your tests use the command:
```php artisan dusk```
This will run the ExampleTest in tests\Browser\ExampleTest.php.

You may save time by re-running the failing tests first using the dusk:fails command
```php artisan dusk:fails```

If you need to execute particular testcase only you can use following command
```php artisan dusk tests/Browser/ExampleTest.php```

## Forms and Authentication
-------------------------------------
php artisan make:auth
add Schema::defaultStringLength(191) in your app\Providers\AppServiceProvider.php
```
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;

public function register()
{
    if ($this->app->environment('local', 'testing')) {
        $this->app->register(DuskServiceProvider::class);
    }
}
public function boot()
{
    Schema::defaultStringLength(191);
}
```
run 
```php artisan migrate```

### Testcase
Create new testcase
```php artisan dusk:make LoginTest```
Now in your tests\Browserfolder you will see the file LoginTest.php

If you need to create testcase inside of particular folder, you can use following command.
```php artisan dusk:make myapplication/LoginTest```

### create page
```php artisan dusk:page  LoginPage```
Now in your tests\Browser\Pagesfolder you will see the file LoginPage.php.

### sample code for login
tests\Browser\Pages\LoginPage.php

```


```






