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

Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');

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
Route::get('/cart', 'ProductsController@shopping_cart')->name('cart')->middleware('auth');
Route::get('/add-to-cart', 'ProductsController@add_to_cart')->name('add_to_cart')->middleware('auth');
Route::delete('/remove_from_cart/{item}', 'ProductsController@remove_from_cart')->name('remove_from_cart')->middleware('auth');
Route::get('/products/fruits', 'ProductsController@fruits')->name('fruits');
Route::get('/products/others', 'ProductsController@others')->name('others');
Route::get('/products/items', 'ProductsController@product_items')->name('product_items');
Route::get('/products/vegetables', 'ProductsController@vegs')->name('vegs');
Route::get('/products/fruits/{sub_category}', 'ProductsController@products')->name('fruit-products');
Route::get('/products/{product_id}', 'ProductsController@product')->name('product');
Route::get('/confirm-order', 'ProductsController@confirm_order')->name('confirm-order')->middleware('auth');
Route::get('/place-order', 'ProductsController@placeOrder')->name('place-order')->middleware('auth');
Route::get('/jobs', 'CareersController@index')->name('jobs');
Route::get('/jobs/{job}', 'CareersController@job')->name('job');
Route::get('/recipes', 'RecipeController@index')->name('recipes');
Route::get('/recipes/{recipe}', 'RecipeController@recipe')->name('recipe');
Route::get('/contact', 'IndexController@contact')->name('contact');
Route::get('/terms', 'TersmPrivacyController@terms')->name('terms');
Route::get('/privacy', 'TersmPrivacyController@privacy')->name('privacy');

Route::get('/administrator/login', 'Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
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
    Route::resource('sub-category', 'Admin\SubCategoryController', ['except' => 'show']);
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