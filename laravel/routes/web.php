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
Route::get('/', 'IndexController@index')->name('index');
Route::post('/contact', 'ContactController@save_message')->name('save-message');

Auth::routes();

Route::get('/auth/update', 'User@showUpdateForm')->name('update-form')->middleware('auth');
Route::get('/auth/change-password', 'User@showPasswordChangeForm')->name('change-password')->middleware('auth');
Route::put('/auth/update', 'User@updateUser')->name('store-update-form')->middleware('auth');
Route::post('/auth/change-password', 'User@storeNewPassword')->name('store-change-password')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'AboutUsController@index')->name('about');
Route::get('/team', 'AboutUsController@team')->name('team');
Route::get('/csr', 'AboutUsController@csr')->name('csr');
Route::get('/quality-control', 'AboutUsController@quality_control')->name('quality-control');
Route::get('/products', 'ProductsController@all_products')->name('products');
Route::get('/add-to-cart/{id}', 'ProductsController@add_to_cart')->name('add_to_cart');
Route::get('/shopping-cart', 'ProductsController@getCart')->name('product.shopping-cart');
Route::post('/cart', 'ProductsController@updateQty')->name('updateQty');
Route::get('/checkout', 'ProductsController@getCheckOut')->name('checkout');
Route::get('/empty-cart', 'ProductsController@emptyCart')->name('emptyCart');
Route::post('/checkout', 'ProductsController@placeOrder')->name('placeOrder');
Route::get('/remove_from_cart/{item}', 'ProductsController@removeFromCart')->name('remove_from_cart');
Route::get('/products/category/{category}', 'ProductsController@product_items')->name('product-category');
Route::get('/product/{slug}', 'ProductsController@product')->name('product');
Route::get('/jobs', 'CareersController@index')->name('jobs');
Route::get('/jobs/{job}', 'CareersController@job')->name('job');
Route::get('/recipes', 'RecipeController@index')->name('recipes');
Route::get('/recipes/{recipe}', 'RecipeController@recipe')->name('recipe');
Route::get('/contact', 'IndexController@contact')->name('contact');
Route::get('/terms', 'TersmPrivacyController@terms')->name('terms');
Route::get('/privacy', 'TersmPrivacyController@privacy')->name('privacy');

Route::get('/administrator/login', 'Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::get('/administrator/password/reset-link', 'Admin\Auth\AdminForgotPasswordController@showLinkRequestForm')
    ->name('admin.password.reset_link');
Route::post('/administrator/password/email', 'Admin\Auth\AdminForgotPasswordController@sendResetLinkEmail')
    ->name('admin.password.email');
Route::get('administrator/password/reset/{token}', 'Admin\Auth\AdminResetPasswordController@showResetForm')
    ->name('reset-form');
Route::post('administrator/password/reset', 'Admin\Auth\AdminResetPasswordController@reset')
    ->name('admin-reset');
Route::post('/administrator/login', 'Admin\Auth\AdminLoginController@submitLogin')->name('admin.submit-login');
Route::post('/administrator/logout', 'Admin\Auth\AdminLoginController@logout')->name('admin.logout');
Route::group([
    'prefix' => 'administrator',
    'middleware' => ['admin']
], function () {
    Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::resource('admins', 'Admin\AdminController', ['except' => 'show']);
    Route::resource('teams', 'Admin\TeamController', ['except' => 'show']);
    Route::get('csr', 'Admin\CSRController@getCSRForm')->name('admin.csr');
    Route::get('quality-control', 'Admin\QualityController@getQualityControlForm')->name('admin.quality');
    Route::post('quality-control', 'Admin\QualityController@store')->name('admin.quality.store');
    Route::get('about', 'Admin\AboutUsController@getAboutUsForm')->name('admin.about');
    Route::post('csr', 'Admin\CSRController@store')->name('admin.csr.store');
    Route::post('about', 'Admin\AboutUsController@store')->name('admin.about.store');
    Route::resource('slider', 'Admin\CoureselController', ['except' => 'show']);
    Route::resource('services', 'Admin\ServicesController', ['except' => 'show']);
    Route::resource('products', 'Admin\ProductController', ['except' => 'show']);
    Route::get('orders', 'Admin\OrdersController@index')->name('orders');
    Route::get('orders/{order}', 'Admin\OrdersController@show')->name('order');
    Route::delete('products/{product}/image/{image}', 'Admin\ProductController@destroyImage')->name('destroy-image');
    Route::delete('recipes/{recipe}/image/{image}', 'Admin\RecipesController@destroyImage')->name('destroy-recipe-image');
    Route::resource('recipes', 'Admin\RecipesController', ['except' => 'show']);
    Route::resource('mailbox', 'Admin\MailBoxController', ['only' => ['index', 'show', 'destroy']]);
    Route::resource('careers', 'Admin\CareersController', ['except' => 'show']);
    Route::put('careers/close/{career}', 'Admin\CareersController@close')->name('careers.close');
    Route::get('registered-users/', 'Admin\UsersController@index')->name('registered-users');
    Route::get('terms', 'Admin\TermsController@getTermsForm')->name('admin.terms');
    Route::post('terms', 'Admin\TermsController@store')->name('admin.terms.store');
    Route::get('privacy', 'Admin\PrivacyController@getPrivacyForm')->name('admin.privacy');
    Route::post('privacy', 'Admin\PrivacyController@store')->name('admin.privacy.store');
});
Route::get('/client-mailable', function () {
    $order = App\Order::find(1);
    return new App\Mail\OrderRequestAdmin($order);
});