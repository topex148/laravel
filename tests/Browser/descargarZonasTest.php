<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class descargarZonasTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
      $this->browse(function (Browser $browser) {
          $user = \App\User::findOrFail(1);
          $browser->loginAs($user)
                  ->visit('/zonas')
                  ->assertSee('Lista de Zonas')
                  ->click('@login-button');
        });
    }
}
