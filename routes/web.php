<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Input;

Route::get('/old', function () {
    return view('welcome');
});
Route::get('/category', function () {
    return view('/categories/show');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/software', function () {
    return view('/categories/show_n');
});
Route::get('/olditems', function () {
    return view('/users/old_items');
});
Route::get('/fileuploaderror', function () {
    return view('filebig');
});
Route::get('/', 'HomeController@newindex');
Route::get('/home', 'HomeController@newindex');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'CategoryController@show')->name('show');
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product/{slug}', 'ProductController@show')->name('productshow');
Route::post('/category', function(){
   $id = Input::get('category_id');    
  # return Redirect::action('FrontController@buscarPrd', array('nom'=>$bsqd));
   return redirect('/category/'.$id);

});



Route::group(['middleware' => 'auth'], function () {
	Route::get('myprofile/update/{email}', 'HomeController@myprofile')->name('myprofile');
	Route::post('/register/{email}', 'HomeController@updateprofile')->name('updateprofile');
	Route::get('myitems/{email}', 'HomeController@myitems')->name('myitems');
	Route::get('/product/edit/{slug}', 'ProductController@edit')->name('edit');
	Route::post('/product/{id}/image-deleted', 'ProductsPhotoController@destroy');
	Route::post('/product/{slug}', 'ProductController@update');
	Route::get('/product_new', 'ProductController@create');
	Route::post('/products', 'ProductController@store');
	Route::get('/cryptocurrency/new', 'CryptocurrencyController@create');
	Route::post('/cryptocurrencies', 'CryptocurrencyController@store');
	Route::get('/cryptocurrency/edit/{id}', 'CryptocurrencyController@edit');
	Route::post('/cryptocurrencies/{id}', 'CryptocurrencyController@update');
});

//Route::group(['middleware' => 'check-permission:admin|superadmin'], function () {
	Route::get('/admin/panel', 'AdminController@index')->name('adminpanel');
	Route::get('/admin/categories', 'AdminController@categories')->name('admincategories');
	Route::get('/admin/posts', 'AdminController@posts')->name('adminposts');
	Route::post('/categoriess', 'CategoryController@store');
	Route::post('/category/{id}', 'CategoryController@update');
	Route::post('/category/delete/{id}', 'CategoryController@destroy');
	//Posts
	Route::get('/news', 'PostController@index');
	Route::get('/admin/post/new', 'PostController@create');
	Route::post('/admin/posts', 'PostController@store');
	Route::get('/news/{slug}', 'PostController@show');
	Route::get('/admin/post/edit/{slug}', 'PostController@edit');
	Route::post('/admin/post/{slug}', 'PostController@update');
	Route::get('/admin/post/delete/{slug}', 'PostController@destroy');
	Route::get('/admin/posts', 'AdminController@posts');
//});	


Route::get('/cryptocurrencies', 'CryptocurrencyController@index');

Route::any('/search', 'ProductController@search');
//admin
$this->post('login', 'Auth\LoginController@login');
//$this->post('login', 'LognController@autheicate');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->post('/toregister', 'Auth\RegisterController@toregister')->name('toregister');
$this->get('/register/{name}/{price}', 'Auth\RegisterController@register')->name('register');
$this->get('/register', 'Auth\RegisterController@newregister')->name('register');
#$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->get('investor/register', 'Auth\RegisterController@investor')->name('register');
$this->post('/newregister', 'Auth\RegisterController@new_register');
$this->post('/bitregister', 'Auth\RegisterController@bit_register');
$this->post('/innovator/update/{id}', 'StartupController@postinnovator_update');
#$this->post('register', 'Auth\RegisterController@register');
$this->post('/investor/register', 'Auth\RegisterController@postinvestor');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

//admin