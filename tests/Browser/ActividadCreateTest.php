<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ActividadCreateTest extends DuskTestCase
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
                  ->visit('/actividades/create')
                  ->assertSee('Formulario Actividades')
                  ->value('#titulo', 'Ciclismo')
                  ->value('#descripcion', 'Es una actividad que se practica en las montañas en una bicicleta.')
                  ->select('id_P_3', '1')
                  ->screenshot('actividadesCreate')
                  ->press('#submitAct')
                  ->screenshot('actividade');
        });
    }
}
