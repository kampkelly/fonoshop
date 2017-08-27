<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LinksTest extends DuskTestCase
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
                    ->assertSee('All Products')
                    ->assertPathIs('/products')
                    ->clickLink('Cryptocurrencies')
                    ->assertSee('Available Cryptocurrencies')
                    ->assertPathIs('/cryptocurrencies')
                    ->clickLink('Sell Cryptocurrency')
                    ->assertSee('Price')
                    ->assertPathIs('/cryptocurrency/new')
                    ->clickLink('Sell A Product')
                    ->assertSee('Product Title')
                    ->assertPathIs('/product_new')
                    ->clickLink('Site News')
                    ->assertSee('Appreciating')
                    ->assertPathIs('/news')
                    ->clickLink('Buy Now');
                  //  ->type('item', 'game');
                 //   ->press('span')
                 //   ->assertSee('Gameboy');
        });
    }
}
