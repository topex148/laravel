<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Register extends DuskTestCase
{

    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *@test
     * @return void
     */
    public function a_user_can_register()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    ->type('name', 'Daniel')
                    ->type('email', 'daniel@gmail.com')
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->press('Registrar')
                    ->assertPathIs('/home');
        });
    }
}
