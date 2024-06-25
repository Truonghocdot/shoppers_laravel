<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ShopController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Customer\DetailProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\CouponController;

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class,"index"])->name("home");
    //cart
    Route::middleware(['userVerified'])->group(function () {
        Route::get("cart",[CartController::class,'index'])->name("cart.index");
        Route::post("add-cartitem",[CartController::class,'addCartItem'])->name('cart.add.item');
        Route::post('update-cartitem',[CartController::class,'updateCart'])->name('cart.update.item');
        Route::get('delete-cart-item/{id}',[CartController::class,'deleteCartItem'])->name('cart.delete.item');
    });
    //wishlist
    Route::middleware(['userVerified'])->prefix('wishlist')->group(function () {
       Route::get("",[WishlistController::class, 'index'])->name('wishlist');
       Route::patch("/add",[WishlistController::class, 'add_new'])->name('wishlist.new');
       Route::get("/delete/{id}",[WishlistController::class, 'delete_item'])->name('wishlist.delete');
    });
    // shop
    Route::get('shop',[ShopController::class,'index'])->name("shop");
    Route::get("/shop/{title}",[ShopController::class,"fillter_category"])->name("shop.category");
    Route::get("/shop/fillter/price/{type}",[ShopController::class,"fillter_price"])->name('shop.fillter.price');
    Route::get("/shop/fillter/name/{type}",[ShopController::class,"fillter_name"])->name("shop.fillter.name");
    Route::get("/shop/price/range",[ShopController::class,'fillter_range_price'])->name("shop.price.range");
    Route::post('/shop/search',[ShopController::class,'search_by_name'])->name('shop.search.name');
    // detail product
    Route::get('/product/{id}', [DetailProductController::class, 'index'])->name("product.detail");
    //checkout
    Route::get('checkout',function(){
        return view('customer.checkout.index');
    })->name('checkout');
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

        //product
        Route::get("/products",[ProductController::class,"ShowProducts"])->name("ShowProducts");
        Route::get("/createProduct",[ProductController::class,"ShowFormAddProduct"])->name("ShowFormAddProduct");
        Route::post("/storeProduct",[ProductController::class,"StoreNewProduct"])->name("StoreNewProduct");
        Route::get("/editProduct/{id}",[ProductController::class,"ShowFormEditProduct"])->name("ShowFormEditProduct");
        Route::delete('product/{id}', [ProductController::class,"DeleteProduct"])->name("deleteProduct");
        Route::post("/updateProduct/{id}" , [ProductController::class,"UpdateProduct"])->name("updateProduct");

        //categories
        Route::get("/categories",[CategoriesController::class,"ShowCategories"])->name("ShowCategories");
        Route::get("/createCategory",[CategoriesController::class,"ShowFormAddCategory"])->name("ShowFormAddCategory");
        Route::post("/storeCategory",[CategoriesController::class,"StoreNewCategory"])->name("StoreNewCategory");
        Route::get("/editCategory/{id}",[CategoriesController::class,"ShowFormEditCategory"])->name("ShowFormEditCategory");
        Route::delete('Category/{id}', [CategoriesController::class,"DeleteCategory"])->name("deleteCategory");
        Route::post("/updateCategory/{id}" , [CategoriesController::class,"UpdateCategory"])->name("updateCategory");

        //account
        Route::get("/account",[AccountController::class,'index'])->name("showAccount");
        Route::delete("/account/delete/{id}",[AccountController::class,"deleteAccount"])->name("admin.account.delete");
        Route::get("/account/ban/{id}",[AccountController::class,"banAccount"])->name("admin.account.ban");
        Route::get('/account/removeban/{id}', [AccountController::class, 'RemoveBanAccount'])->name('admin.account.removeban');
        Route::get("/account/profile/{id}",[AccountController::class,"showProfile"])->name("admin.account.profile");

        //coupon
        Route::get('/coupon',[CouponController::class,'index'])->name('admin.coupon');
        Route::get("/coupon/delete/{id}",[CouponController::class,'deleteCoupon'])->name('admin.coupon.delete');
        Route::post('/coupon/newdaily',[CouponController::class,'addNewDaily'])->name('admin.coupon.newdaily');
        Route::post('/coupon/newByuser',[CouponController::class,'addNewByUser'])->name('admin.coupon.byuser');

    });

});