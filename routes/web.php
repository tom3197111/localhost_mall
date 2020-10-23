<?php
//首頁
// Route::get('/', 'HomeController@indexPage');
// //使用者
// Route::get('user/auth/sign-up','UserAuthController@signUpPage');
// Route::post('user/auth/sign-up','UserAuthController@signUpProcess');
// Route::get('user/auth/sign-in','UserAuthController@signInPage');
// Route::get('user/auth/sign-out','UserAuthController@signUpOut');
//首頁
Route::get('/', 'HomeController@indexPage');
Route::get('/random/{User_Random?}', 'UserAuthController@User_Random');
// Auth::routes(['verify' => true]);
// Route::get('profile', function () {
//    return "my email";
// })->middleware('verified');

//使用者
Route::group(['prefix' => 'user'],function(){
    Route::group(['prefix' => '/auth'],function(){
        Route::post('/user_updata','UserAuthController@user_updata');
        Route::post('/Sign_up_account','UserAuthController@Sign_up_account');
        Route::post('/Sign_in','UserAuthController@Sign_in');
        Route::get('/Sign_out','UserAuthController@Sign_out');
        Route::post('/Sign_up_Email','UserAuthController@Sign_up_Email');
        Route::post('/Sign_up_phone','UserAuthController@Sign_up_phone');
        Route::post('/Sign_up','UserAuthController@Sign_up');
        Route::post('/user_adders_updata','UserAuthController@user_adders_updata');
        Route::post('/forget_account','UserAuthController@forget_account');
    });

});
//中介層 如果沒有先登錄 會返回首頁
Route::group(['middleware' => ['user.login']], function () {
    Route::post('/add_Shopping_cart','Shopping_cartController@add_Shopping_cart');
    Route::post('/select_Shopping_cart','Shopping_cartController@select_Shopping_cart');
    Route::post('/delete_Shopping_cart','Shopping_cartController@delete_cart');
    Route::post('/update_Shopping_cart','Shopping_cartController@update_cart');
    Route::any('/checkout','OrderController@order_creation');
    Route::post('/checkout/Ecpay','OrderController@Ecpay');

});

Route::post('/order_ending/ok','OrderController@order_ending');
