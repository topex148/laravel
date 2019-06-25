<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use App\User;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ActividadTest extends DuskTestCase
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
                    ->visit('/actividades')
                    ->assertSee('Lista de Actividades')
                    ->screenshot('actividades');
        });
    }
}
