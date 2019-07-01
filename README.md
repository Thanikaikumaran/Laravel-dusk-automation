# Laravel-dusk-automation
> Laravel Dusk was one of the new features introduced in Laravel 5.4. Dusk is a tool for application testing.Laravel Dusk is a powerful browser automation tool for Laravel. With Dusk you can programmatically test your own applications or visit any website on the internet using a real Chrome browser. By default, Dusk does not require you to install JDK or Selenium on your machine. Instead, Dusk uses a standalone Chromedriver. 

## Laravel Installation
> To begin create a new Laravel project

```composer create-project --prefer-dist laravel/laravel Laravel-dusk-automation```

## Install dusk in your laravel project

```composer require --dev laravel/dusk``` then
```php artisan dusk:install```

> Once you install dusk you can see dusk files in ->tests\Browser directory.

## Running Tests
> To run your tests use the command:

```php artisan dusk```

> This will run the ExampleTest in tests\Browser\ExampleTest.php.
You may save time by re-running the failing tests first using the dusk:fails command

```php artisan dusk:fails```

> If you need to execute particular testcase only you can use following command

```php artisan dusk tests/Browser/ExampleTest.php```

## Forms and Authentication
```php artisan make:auth```

> add Schema::defaultStringLength(191) in your app\Providers\AppServiceProvider.php

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
> run 
```php artisan migrate```

### Testcase
> Create new testcase

```php artisan dusk:make LoginTest```

> Now in your tests\Browserfolder you will see the file LoginTest.php
If you need to create testcase inside of particular folder, you can use following command.

```php artisan dusk:make myapplication/LoginTest```

### create page
```php artisan dusk:page  LoginPage```

> Now in your tests\Browser\Pagesfolder you will see the file LoginPage.php.

### sample code for login
> tests\Browser\Pages\LoginPage.php

```
public function elements()
{
    return [
        '@username' => '#email',
        '@pwd' => '#password',           
    ];
}
    
public function signIn(Browser $browser,$username,$pwd){
   $browser ->clickLink('Login')
            ->value('@username', $username)
            ->value('@pwd', $pwd)
            ->press('Login');
}

```

> tests\Browser\LoginTest.php

```
use Tests\Browser\Pages\LoginPage;
public function testExample()
{
    $this->browse(function (Browser $browser) {
        $browser->visit(new LoginPage)
                ->maximize()
                ->signIn('suba@gmail.com','test1234')
                ->assertSee('Dashboard');
    });
}

```

> If you like to see chrome driver with automation , 
> commend '--headless' line 
-> tests\DuskTestCase.php

```
protected function driver()
{
    $options = (new ChromeOptions)->addArguments([
        '--disable-gpu',
        // '--headless',
        '--window-size=1920,1080',
    ]);

    return RemoteWebDriver::create(
        'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
            ChromeOptions::CAPABILITY, $options
        )
    );
}

```
run LoginTest 
```php artisan dusk tests/Browser/LoginTest.php```
###### Output
```
PHPUnit 7.5.13 by Sebastian Bergmann and contributors.
DevTools listening on ws://127.0.0.1:4602/devtools/browser/5ef72601-785a-4bc4-8831-cc310d629372
.                                                                   1 / 1 (100%)

Time: 6.43 seconds, Memory: 16.00 MB
OK (1 test, 1 assertion)
```

### Useful Links
[Laravel assertions ] (https://laravel.com/docs/5.8/dusk#available-assertions)



