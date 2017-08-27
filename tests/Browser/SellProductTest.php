<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SellProductTest extends DuskTestCase
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
                    ->clickLink('Sell A Product')
                    ->assertPathIs('/product_new')
                    ->type('name', 'Test Person')
                    ->type('product_title', 'Nintendo')
                    ->type('price', 40000)
                    ->type('description', 'This Nintendo is a very exciting game.')
                    ->radio('condition', 'new')
                    ->attach('image', __DIR__.'/pics/buy 3.jpg')
                  //  ->attach('photos[]', __DIR__.'/pics/buy 3.jpg')
                    ->type('phone', 01234567)
                    ->select('category_id', 3)
                    ->select('state', 'Lagos')
                    ->type('city', 'Lagos')
                    ->press('Add Product');
                  //  ->assertPathIs('/cryptocurrencies');
        });
    }
}
