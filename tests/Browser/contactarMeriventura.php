<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class contactarMeriventura extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contacto')
                    ->assertSee('Contáctanos')
                    ->value('#nombre', 'Joe Schmoe')
                    ->value('#correo', 'joe@example.com')
                    ->value('#Telefono', '(999) 999-9999')
                    ->value('#Asunto', 'Prueba')
                    ->select('Area', 'Turista')
                    ->value('#Mensaje', 'hola, es una prueba')
                    ->attach('#archivo', __DIR__.'/storage/ciclista1.jpg')
                    ->screenshot('contacto')
                    ->press('#submit');
        });
    }
}
