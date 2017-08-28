<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;
use App\Cryptocurrency;
use App\CryptoCategory;
use App\Contact;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Mail\Mailer;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendTestEmail;
use App\Jobs\WelcomeRegistrationEmail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('guest', ['except' => ['myprofile', 'myitems', 'updateprofile']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


     public function newindex()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        $products = Product::where('status', 'active')->orderBy('id', 'desc')->simplePaginate(12);
        $prods = Product::where('status', 'active')->orderBy('id', 'desc')->simplePaginate(3);
        $cryptocurrencies = Cryptocurrency::simplePaginate(10);
        $cryptocategories = Cryptocategory::simplePaginate(10);
        return view('home', compact('categories', 'products', 'cryptocurrencies', 'prods', 'cryptocategories'));
    }

    public function index()
    {
        $categories = Category::all();
        $products = Product::where('status', 'active')->orderBy('id', 'desc')->simplePaginate(1);
        return view('welcome', compact('categories', 'products'));
    }
    public function contact(Request $request)
    {
        $contact_email = $request->contact_email;
        $contact_name = $request->contact_name;
        $contact_message = $request->contact_msg;
        $email_data = array(
          //   'recipient' => $user->user_email,
          //   'recipient' => $request->contact_email,
             'recipient' => 'infosalesnaija@gmail.com',
             'subject' => 'New Message From '.$contact_name.'(SalesNaija)'
              );
                $act_code = str_random(60);
                $view_data = array(
                'actkey' => $act_code,
              //  'email' => Auth::user()->email,
                'contact_email' => $request->contact_email,
                'contact_name' => $request->contact_name,
                'contact_message' => $request->contact_msg
            );
             //   $this->dispatch((new SendContactMessage($view_data))->delay(10));
              Mail::send('emails.sendcontactmessage', $view_data, function($message) use ($email_data) {
                  $message->to( $email_data['recipient'] )
                          ->subject( $email_data['subject'] );
              });
              Contact::create([
                'name' => $request->contact_name,
                'email' => $request->contact_email,
                'message' => $request->contact_msg
               ]); 

         /*     Mail::send('emails.sendcontactmessage', array('a_value' => 'you_could_pass_through'), function($message)
                {
                    $message->to('sample1@gmail.com', 'John Smith')->cc('sample2@yahoo.com')->subject('Example!');
                }); */
        session()->flash('message', 'Message sent. We wil get back to you shortly via email!'); //THEN INCLUDE IN THE REDIRECTED FUNCTION, HERE ITS "SHOW"
            return redirect()->back();
    }

}
