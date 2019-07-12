<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/register')
                    ->assertSee('Registrar')
                    ->value('#name', 'Joe Schmoe')
                    ->value('#email', 'jasi@example.com')
                    ->value('#password', '12345678')
                    ->value('#password-confirm', '12345678')
                    ->screenshot('register')
                    ->press('Registrar')
                    ->screenshot('registro');

        });
    }
}
