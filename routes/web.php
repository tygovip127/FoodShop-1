<?php

use Illuminate\Support\Facades\Route;
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
Route::post("/login", [Auth\LoginController::class, 'show'])->name('login');

Route::get('/products', function () {
    return view('products');
}); 

Route::get("/products/{id}", function () {
    return view('products.show');
});

Route::get("/cart", function () {
    return view('cart');
});

Route::get('/account', function () {
    return view('account');
});