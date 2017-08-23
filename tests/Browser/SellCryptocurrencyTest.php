<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SellCryptocurrencyTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Want To Sell')
                    ->clickLink('Login')
                    ->type('email', 'kampkellykeys@gmail.com')
                    ->type('password', 'kampkelly')
                    ->press('Login')
                    ->assertDontSee('Want To Sell')
                    ->clickLink('Products')
                    ->clickLink('Buy Now')
                    ->clickLink('Sell Cryptocurrency')
                    ->type('price', 30000)
                    ->select('currency', 'Bitcoins')
                    ->press('Sell Cryptocurrency')
                    ->assertSee('My Products')
                    ->clickLink('Products')
                    ->clickLink('Site News')
                    ->clickLink('Cryptocurrency');
        });
    }
}
