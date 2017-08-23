<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Tests\Browser\Pages\SellCryptocurrency;

class SigninTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(4);
            $browser->visit('/')
               //     ->assertSee('Want To Sell')
                    ->clickLink('Login')
                    ->type('email', 'kampkellykeys@gmail.com')
                    ->type('password', 'kampkelly')
                    ->press('Login')
                    ->assertDontSee('Want To Sell');
        });
    }
}
