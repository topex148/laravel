<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Ingresar')
                    ->value('#email', 'admin@example.com')
                    ->value('#password', 'secret')
                    ->screenshot('login')
                    ->press('Ingresar')
                    ->screenshot('home');
        });
    }
}
