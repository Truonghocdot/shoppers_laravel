<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController ;
use App\Http\Controllers\Admin\DashboardController ;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('', function () {
        return view('customer.home.index');
    })->name("home");
    
    Route::get('cart', function () {
        return view('customer.cart.index');
    })->name("cart");
    
    Route::get('shop', function () {
        return view('customer.products.index');
    })->name("shop");
    
    Route::get('detail', function () {
        return view('customer.product.index');
    });
    
    Route::get('contact', function () {
        return view('customer.contact.index');
    })->name("contact");
    
    Route::get('about', function () {
        return view('customer.about.index');
    })->name('about');
    
    Route::prefix('auth')->group(function (){
        Route::get('/login',[AuthController::class,'ShowLogin'] )->name('ShowLogin');
        
        Route::get('/register',[AuthController::class,'ShowRegister'] )->name('ShowRegister'); 

        Route::post("/createAccount",[AuthController::class,'CreateAccount'])->name("createAccount");

        Route::post("/LogonAccount",[AuthController::class,"LogonAccount"])->name("LogonAccount");

        Route::get("/logout",[AuthController::class,"Logout"])->name("logout");
    });

    Route::middleware(['adminVerified'])->prefix("admin")->group(function () {
        Route::get("/dashboard",[DashboardController::class,'index'])->name('dashboard');
        Route::get("/products",[ProductController::class,"ShowProducts"])->name("ShowProducts");
        Route::get("/createProduct",[ProductController::class,"ShowFormAddProduct"])->name("ShowFormAddProduct");
        Route::post("/storeProduct",[ProductController::class,"StoreNewProduct"])->name("StoreNewProduct");
        Route::get("/editProduct/{id}",[ProductController::class,"ShowFormEditProduct"])->name("ShowFormEditProduct");
        Route::delete('users/{id}', [ProductController::class,"DeleteProduct"])->name("deleteProduct");
    });

});