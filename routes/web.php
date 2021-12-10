<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login-register',function (){
    return Auth::user()?  redirect('/account'):  view('login-register');
})->name('login-register');

Route::post('/register', [Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::post("/login", [Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::put('/change-password', [Controllers\Auth\ResetPasswordController::class, 'changePassword'])
    ->name('change-password');
Route::get("/forgot-password", function (){
    return view("user.forgot-password");
});
Route::post("/forgot-password", [Controllers\Auth\ResetPasswordController::class, 'sentEmailLink'])->name("password.email");

Route::get('/reset-password/{token}', [Controllers\Auth\ResetPasswordController::class, 'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/update-password', [Controllers\Auth\ResetPasswordController::class, 'updatePassword'])
    ->middleware('guest')->name('password.update');


Route::get("/logout", function () {
    Auth::logout();
    return redirect()->intended('/login-register');
})->name('logout');

//route login with google
Route::get('/google', [Controllers\Auth\LoginController::class,'redirectToGoogle']);
Route::get('/google/callback',  [Controllers\Auth\LoginController::class,'handleGoogleCallback']);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [Controllers\ProductController::class, 'showProducts'])->name('products');
Route::get('/products/filter', [Controllers\ProductController::class, 'filter'])->name('products.filter');
Route::get("/products/{id}", [Controllers\ProductController::class, 'show'])->name('product.show');
Route::get("/search", [Controllers\ProductController::class, 'search'])->name('search');
Route::post('/rating',[Controllers\ProductController::class, 'rating'])->name('rating');

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

Route::get("/order",[Controllers\OrderController::class, 'index'])->middleware('auth')->name("order.index");
Route::post("/order/store",[Controllers\OrderController::class, 'store'])->name("order.store");

//route for admin
Route::middleware(['auth', 'can:access_admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/users', UserController::class);
        Route::resource('/category', Controllers\CategoryController::class);
        Route::resource('/products', Controllers\ProductController::class)->except(['show']);
        Route::resource('/banner', Controllers\BannerController::class);
        Route::resource('/roles', RoleController::class);
        Route::resource('/transactions', TransactionController::class);
        Route::resource('/permissions', PermissionController::class);
    });
});
 

Route::get("/test", function(Request $request){
    // return App\Models\Transaction::select('user_id',DB::raw('sum(total)'),DB::raw('count(user_id)'))
    // ->where('user_id','=','2')
    // ->groupBy('user_id')
    // ->get();
    // return Order::select(Order::raw('sum(price)'))->get();
    // return view('test');
   
});


