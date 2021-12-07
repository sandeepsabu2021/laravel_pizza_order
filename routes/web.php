<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Middleware\Session_mw;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([Session_mw::class])->group(function () {
    Route::get('/test', function () {
        return "Session available";
    });

    Route::get('/home', [Admin::class, 'home']);

    Route::get('/menu', [Admin::class, 'menu']);
    Route::post('/addcart', [Admin::class, 'addcart']);

    Route::get('/cart', [Admin::class, 'cart']);
    Route::delete('/delcart', [Admin::class, 'delcart']);
    Route::get('/payment/{amt}', [Admin::class, 'payment']);
    Route::post('/payvalid', [Admin::class, 'payvalid']);

    Route::get('/editprofile', [Admin::class, 'editprofile']);
    Route::post('/updatevalid', [Admin::class, 'updatevalid']);

    Route::get('/changepassword', [Admin::class, 'changepass']);
    Route::post('/passvalid', [Admin::class, 'passvalid']);

    Route::get('/order', [Admin::class, 'order']);

    Route::get('/logout', [Admin::class, 'logout']);
});

Route::get('/register', [Admin::class, 'register']);
Route::post('/regvalid', [Admin::class, 'regvalid']);

Route::get('/login', [Admin::class, 'login']);
Route::post('/logvalid', [Admin::class, 'logvalid']);
