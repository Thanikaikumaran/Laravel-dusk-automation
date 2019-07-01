<?php

namespace Tests\Browser\Pages;
use Laravel\Dusk\Browser;
class LoginPage extends Page
{
    public function url()
    {
        return 'http://localhost/Laravel-dusk-automation/public/';
    }

    
    public function assert(Browser $browser)
    {
        //$browser->assertPathIs($this->url());
    }

    
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
}
