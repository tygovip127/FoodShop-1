<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use App\Models;
use App\Models\Province;
use App\Models\Banner;
use App\Models\Product;
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
    $banners= Banner::all();
    $products = Product::paginate(8);
    return view('index', compact('banners', 'products'));
});

Route::get('/login-register',function (){
    if(Auth::user()){
        return redirect('/account');
    }
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
Route::get('/products', [Controllers\ProductController::class, 'showProducts'])->name('products');
Route::get("/products/{id}", [Controllers\ProductController::class, 'show'])->name('product.show');
Route::get("/search", [Controllers\ProductController::class, 'search'])->name('search');

Route::get("/error", function (){
    return view('error');
});

// Route::put("/users/{id}", [Controllers\UserController::class, 'update'])->name('users.update');
// Route::get('/users',[Controllers\UserController::class, 'index']);

Route::get("/cart",[Controllers\CartController::class, 'index']);
Route::get("/cart/add-to-cart/{id}", [Controllers\CartController::class, 'addToCart'])->name('addToCart');
Route::delete("/cart/remove-cart-item", [Controllers\CartController::class, 'remove'])->name('removeCartItem');
Route::put("/cart/update", [Controllers\CartController::class, 'update'])->name('updateCart');
Route::delete('/cart/remove-all', [Controllers\CartController::class, 'removeAll'])->name("cart.remove.all");

//route for admin
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        // Route::get('/users-management',[Controllers\AdminController::class, "showUsers"])->name('users-managerment');
        Route::resource('/users', UserController::class);
        Route::resource('/category', Controllers\CategoryController::class);
        Route::resource('/products', Controllers\ProductController::class)->except(['show']);
        Route::resource('/banner', Controllers\BannerController::class);
    });
});
 

Route::get("/test", function (){
    //test thử code
    // dd(session()->get('cart',[]));
    $products= Models\Product::paginate(9);
    return view('test', ['products'=> $products]);
});


