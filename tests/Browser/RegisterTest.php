<?php

namespace Tests\Browser;

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
    public function testRegister() #coverphoto, additionalphotos, description, condition, state, city, phone, name, email, password
    {
        $this->browse(function (Browser $browser) {
            $k = str_random(13);
            $browser->visit('/')
                    ->assertSee('Want To Sell')
                    ->type('product_title', 'Games')
                    ->type('price', 10000)
                     ->press('Continue')
                    ->assertSee('Thanks for filling the form, just a little more before submitting!')
                    ->select('category_id', 'Software')
                    ->attach('image', __DIR__.'/pics/buy 3.jpg')
                    #->attach('photos[]', __DIR__.'/photos/me.png')
                    ->type('description', 'This is one of the lates gameboy that has been made recently. Its cool')
                    ->radio('condition', 'new')
                    ->select('state', 'Delta')
                    ->type('city', 'Sapele')
                    ->type('phone', 027226526)
                    ->type('name', 'John')
                    ->type('email', $k.'@gmail.com')
                    ->type('password', 'password')
                    ->press('Submit');
                 #   ->assertSee('Top Selling');
                   // ->assertPathIs('/home'); ;
        });
    }
}
