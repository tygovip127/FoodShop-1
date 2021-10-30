<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers;
use App\Http\Controllers\AddressController;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
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
})->name('login-register');
Route::post('/register', [Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::post("/login", [Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::put('/reset-password', [Controllers\Auth\ResetPasswordController::class, 'reset'])
    ->name('reset-password');
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->intended('/login-register');
})->name('logout');

//route login with google
Route::get('/google', [Controllers\Auth\LoginController::class,'redirectToGoogle']);
Route::get('/google/callback',  [Controllers\Auth\LoginController::class,'handleGoogleCallback']);

Route::get("/cart", function () {
    return view('cart');
});


Route::get("/wishlist", function () {
    return view('wishlist');
});
Route::get('/account', function () {
    $provinces = Province::all();
    $id= Auth::user()->id;
    $address= AddressController::getUserAddress($id);
    return view('account', ['provinces'=> $provinces, 'address'=> $address]);
})->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/error", function (){
    return view('error');
});
Route::put("/users/{id}", [Controllers\UserController::class, 'update'])->name('users.update');

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::resource('/products', Controllers\ProductController::class);
Route::get("/test", function (){
    //test thử code
    return view('test');
});
