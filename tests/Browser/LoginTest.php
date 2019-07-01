<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\LoginPage;

class LoginTest extends DuskTestCase
{
    
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new LoginPage)
                   ->maximize()
                    ->signIn('suba@gmail.com','test1234')
                    ->assertSee('Dashboard');
        });
    }
}
