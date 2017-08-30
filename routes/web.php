<?php


use Illuminate\Support\Facades\Input;


//not useful
Route::get('/sendmail', 'ProductController@sendmail')->name('sendmail');
//not useful
//notauthenticated begins

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
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/fileuploaderror', function () {
    return view('filebig');
});

Route::get('/', 'HomeController@newindex');
Route::get('/home', 'HomeController@newindex');
Route::get('/category/{id}', 'CategoryController@show')->name('show');
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/product/{slug}', 'ProductController@show')->name('productshow');
Route::post('/category', function(){
   $id = Input::get('category_id');    
   return redirect('/category/'.$id);
});
Route::post('/contact', 'HomeController@contact')->name('contact');
Route::get('/cryptocurrency/new', 'CryptocurrencyController@create');
Route::get('/mycryptocurrency/delete/{id}', 'CryptocurrencyController@user_destroy');
Route::get('/news', 'PostController@index');
Route::get('/news/{slug}', 'PostController@show');
Route::get('/cryptocurrencies', 'CryptocurrencyController@index');
Route::any('/search', 'ProductController@search');
//notauthenticated ends

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('myprofile/update/{email}', 'UserController@myprofile')->name('myprofile');
	Route::post('/register/{email}', 'UserController@updateprofile')->name('updateprofile');
	Route::get('myitems/{email}', 'UserController@myitems')->name('myitems');
	Route::get('newitems/{email}', 'UserController@newitems')->name('myitems');
	Route::get('/product/edit/{slug}', 'ProductController@edit')->name('edit');
	Route::post('/product/{id}/image-deleted', 'ProductsPhotoController@destroy');
	Route::post('/product/{slug}', 'ProductController@update');
	Route::get('/new/product', 'ProductController@create');
	Route::post('/products', 'ProductController@store');
	Route::post('/cryptocurrencies', 'CryptocurrencyController@store');
	Route::get('/cryptocurrency/edit/{id}', 'CryptocurrencyController@edit');
	Route::post('/cryptocurrencies/{id}', 'CryptocurrencyController@update');
	
	Route::group(['middleware' => 'check-permission:admin|superadmin'], function () {
		Route::get('/admin/panel', 'AdminController@index')->name('adminpanel');
		Route::get('/admin/categories', 'AdminController@categories')->name('admincategories');
		Route::get('/admin/products', 'AdminController@products')->name('adminproducts');
		Route::get('/admin/posts', 'AdminController@posts')->name('adminposts');
		Route::post('/categoriess', 'CategoryController@store');
		Route::post('/category/{id}', 'CategoryController@update');
		Route::post('/category/delete/{id}', 'CategoryController@destroy');
		//Posts
		
		Route::get('/admin/post/new', 'PostController@create');
		Route::post('/admin/posts', 'PostController@store');
		Route::get('/admin/post/edit/{slug}', 'PostController@edit');
		Route::post('/admin/post/{slug}', 'PostController@update');
		Route::get('/admin/post/delete/{slug}', 'PostController@destroy');
		Route::get('/admin/posts', 'AdminController@posts');
		//Cryptocurrencies
		Route::get('/admin/cryptocurrencies', 'AdminController@cryptocurrencies');
		Route::post('/cryptocurrency/delete/{id}', 'CryptocurrencyController@destroy');
		//Cryptocategory
		Route::get('/admin/cryptocategories', 'AdminController@cryptocategory');
		Route::post('/cryptocategories', 'AdminController@cryptocategory_create');
		Route::post('/cryptocategory/{id}', 'AdminController@cryptocategory_update');
		Route::post('/cryptocategory/delete/{id}', 'AdminController@cryptocategory_destroy');
		//Products
		Route::get('/admin/product/active/{slug}', 'AdminController@product_active');
		Route::get('/admin/product/pause/{slug}', 'AdminController@product_pause');
		Route::get('/admin/product/sold/{slug}', 'AdminController@product_sold');
		Route::post('/admin/product/delete/{id}', 'ProductController@destroy');
		//Products Photos
		Route::get('/admin/products/photos', 'AdminController@products_photos');
		//Users
		Route::get('/admin/users', 'AdminController@users');
	});	
});

//admin
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->post('/toregister', 'Auth\RegisterController@toregister');
$this->get('/register/{name}/{price}', 'Auth\RegisterController@register');
$this->get('/register', 'Auth\RegisterController@newregister');
$this->post('/newregister', 'Auth\RegisterController@new_register');
$this->post('/bitregister', 'Auth\RegisterController@bit_register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

//admin