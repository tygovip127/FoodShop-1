<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/login-register',function (){
    return view('login-register');
});
Route::post('/register', [Auth\RegisterController::class, 'create'])->name('register');
Route::post("/login", [Auth\LoginController::class, 'login'])->name('login');
Route::get("/logout", function () {
    if(session()->has('user')){
        session()->pull('user');
    }
    redirect('/login-register');
});

//route login with google
Route::get('/google', [Auth\LoginController::class,'redirectToGoogle']);
Route::get('/google/callback',  [Auth\LoginController::class,'handleGoogleCallback']);


Route::get('/products', function () {
    return view('products');
}); 

Route::get("/products/{id}", function () {
    return view('products.show');
});

Route::get("/cart", function () {
    return view('cart');
});

Route::get("/wishlist", function () {
    return view('wishlist');
});
Route::get('/account', function () {
    return view('account');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
