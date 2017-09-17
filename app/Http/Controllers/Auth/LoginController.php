<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     //socialite login
     public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

     public function handleProviderCallback($provider)
    {
        try {
            $provideduser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/'.$provider);
        }

        $authUser = $this->findOrCreateser($provideduser, $provider);
    //    $authUser = $this->findOrCreateUser($githubUser);

        Auth::login($authUser, true);

        return Redirect::to('/homepag');
    }
    private function findOrCreateUser($provideduser, $provider)
    {
        if ($authUser = User::where('provider_id', $provideduser->id)->first()) {
            return $authUser;
        } 
     //   return 'its ok';
            return User::create([
                'name' => $provideduser->name,
                'email' => $provideduser->email,
                'provider' => $provider,
                'provider_id' => $provideduser->id,
                'is_permission'=> '0',
                'status' => 'pending'
            ]);
    }

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
