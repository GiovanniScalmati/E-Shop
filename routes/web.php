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

//--------------------------------Navbar routing start-------------------------------------//

Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');


Route::get('/', [
    'uses' => 'profileController@homepage_index',
    'as' => 'homepage_index'
]);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/payment-methods', function () {
    return view('payment_methods');
});

Route::get('/shipping-methods', function () {
    return view('shipping_methods');
});

Route::get('/privacy-policy', function () {
    return view('privacy_policy');
});

Route::get('/about_us', function () {
    return view('about_us');
});

Route::get('/shop', [
    'uses' => 'shopController@index',
    'as' => 'shop.index'
]);

Route::get('/php_training', function () {
    return view('php_training');
});

//--------------------------------Navbar routing end-------------------------------------//

//--------------------------------User Profile routing start-------------------------------------//

Route::get('/dashboard', [
    'uses' => 'profileController@dashboard',
    'as' => 'profile.dashboard'
])->middleware('auth');

Route::get('/account-info', [
    'uses' => 'profileController@info',
    'as' => 'profile.info'
])->middleware('auth');

Route::get('/account-info/billing-info', [
    'uses' => 'profileController@billing_info',
    'as' => 'profile.billing_info'
])->middleware('auth');

Route::get('/account-info/shipping-info', [
    'uses' => 'profileController@shipping_info',
    'as' => 'profile.shipping_info'
])->middleware('auth');

Route::post('/account-info/billing-info/save', [
    'uses' => 'profileController@billing_info_save',
    'as' => 'profile.billing_info_save'
])->middleware('auth');

Route::post('/account-info/shipping-info/save', [
    'uses' => 'profileController@shipping_info_save',
    'as' => 'profile.shipping_info_save'
])->middleware('auth');

//--------------------------------User Profile routing end-------------------------------------//

//--------------------------------Shop routing start-------------------------------------//

Route::get('/shop/types', [
    'uses' => 'shopController@type_index',
    'as' => 'shop.type_index'
]);

Route::get('/shop/breweries', [
    'uses' => 'shopController@brewery_index',
    'as' => 'shop.brewery_index'
]);

Route::get('/shop/abv', [
    'uses' => 'shopController@abv_index',
    'as' => 'shop.abv_index'
]);

Route::get('/shop/ciders', [
    'uses' => 'shopController@ciders_index',
    'as' => 'shop.ciders_index'
]);

Route::get('/shop/non_alcoholic', [
    'uses' => 'shopController@non_alcoholic_index',
    'as' => 'shop.non_alcoholic_index'
]);

Route::get('/shop/accessories', [
    'uses' => 'shopController@accessories_index',
    'as' => 'shop.accessories_index'
]);

Route::get('/shop/home-kit', [
    'uses' => 'shopController@home_kit_index',
    'as' => 'shop.home_kit_index'
]);

Route::get('/shop/barley', [
    'uses' => 'shopController@barley_index',
    'as' => 'shop.barley_index'
]);

Route::get('/shop/beers', [
    'uses' => 'shopController@beers_index',
    'as' => 'shop.beers_index'
]);

Route::get('/shop/{name}', [
    'uses' => 'shopController@page',
    'as' => 'shop.page'
]);

//--------------------------------Shop routing end-------------------------------------//

//--------------------------------Cart routing start-------------------------------------//

Route::get('/my_cart', [
    'uses' => 'profileController@cart',
    'as' => 'profile.cart'
])->middleware('auth');

Route::post('/shop/{product_id}', [
    'uses' => 'profileController@cart_add',
    'as' => 'profile.cart_add'
])->middleware('auth');

Route::get('/my_cart/remove/{product_id}', [
    'uses' => 'profileController@remove',
    'as' => 'my_cart.remove'
])->middleware('auth');

Route::get('/my_cart/more/{product_id}', [
    'uses' => 'profileController@more',
    'as' => 'my_cart.more'
])->middleware('auth');

Route::get('/my_cart/less/{product_id}', [
    'uses' => 'profileController@less',
    'as' => 'my_cart.less'
])->middleware('auth');

//--------------------------------Cart routing end-------------------------------------//

//--------------------------------Order and Checkout routing start-------------------------------------//

Route::get('/checkout', [
    'uses' => 'profileController@checkout',
    'as' => 'profile.checkout'
])->middleware('auth');

Route::get('/order_placed', [
    'uses' => 'PaypalController@order_placed',
    'as' => 'paypal.order_placed'
])->middleware('auth');

Route::post('/checkout/paypal', [
    'uses' => 'PaypalController@payWithpaypal',
    'as' => 'checkout.payWithpaypal'
]);

Route::get('/shop/order_store', [
    'uses' => 'shopController@order_store',
    'as' => 'shop.order_store'
])->middleware('auth');

//--------------------------------Order and Checkout routing end-------------------------------------//

Route::get('login/{provider}', 'SocialController@redirect');

Route::get('login/{provider}/callback','SocialController@Callback');

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
