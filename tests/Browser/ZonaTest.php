<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ZonaTest extends DuskTestCase
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
              ->visit('/zonas/create')
              ->assertSee('Formulario Zona')
              ->value('#nombre', 'Paramo')
              ->value('#descripcion', 'Es una zona fria.')
              ->screenshot('zonas')
              ->press('Registrar')
              ->screenshot('zona');
        });
    }
}
