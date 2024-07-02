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
use App\Http\Controllers\Customer\CouponController as CouponUser ;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\AccounController as profile;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\TypeController ;
use App\Http\Controllers\OrderController ;

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class,"index"])->name("home");
    //cart
    Route::middleware(['userVerified'])->group(function () {
        Route::get("cart",[CartController::class,'index'])->name("cart.index");
        Route::middleware(['addToCart'])->post("add-cartitem",[CartController::class,'addCartItem'])->name('cart.add.item');
        Route::post('update-cartitem',[CartController::class,'updateCart'])->name('cart.update.item');
        Route::get('delete-cart-item/{id}',[CartController::class,'deleteCartItem'])->name('cart.delete.item');
        Route::post("addcoupon",[CartController::class,'add_coupon'])->name("cart.add.coupon");
    });
    Route::get("mail",function(){
        return view('customer.mail');
    });
    Route::middleware(['userVerified'])->prefix('wishlist')->group(function () {
       Route::get("",[WishlistController::class, 'index'])->name('wishlist');
       Route::patch("/add",[WishlistController::class, 'add_new'])->name('wishlist.new');
       Route::get("/delete/{id}",[WishlistController::class, 'delete_item'])->name('wishlist.delete');
    });
    // shop
    Route::get('shop',[ShopController::class,'index'])->name("shop");
    Route::get("/shop/search",[ShopController::class,'search_shop'])->name('shop.search');
    // detail product
    Route::get('/product/{id}', [DetailProductController::class, 'index'])->name("product.detail");
    //checkout
    Route::middleware(['userVerified'])->get('checkout',[CheckoutController::class, 'index'])->name('checkout');
    Route::middleware(['userVerified'])->post('payprocess',[CheckoutController::class, 'payment'])->name('pay');
    Route::middleware(['userVerified'])->get('thanksyou',[CheckoutController::class, 'thanksyou'])->name('thanksyou');

    //coupon
    Route::middleware(['userVerified'])->prefix('coupon')->group(function () {
        Route::get('',[CouponUser::class,'index'])->name("coupon");
    });

    Route::get('contact', function () {
        return view('customer.contact.index');
    })->name("contact");
    
    Route::get('about', function () {
        return view('customer.about.index');
    })->name('about');
    // profile
    Route::middleware(['userVerified'])->group(function () {
        Route::get("profile",[profile::class, 'index'])->name('profile');
        Route::post('cancelOrder',[profile::class,'cancel_order'])->name('order.cancel'); 
        Route::post('confirmSuccess',[profile::class,'confirms_success'])->name('order.confirm');        
    }) ;

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
        Route::post("/products/search" , [ProductController::class,"searchProduct"])->name("admin.product.search");


        //categories
        Route::get("/categories",[CategoriesController::class,"ShowCategories"])->name("ShowCategories");
        Route::get("/createCategory",[CategoriesController::class,"ShowFormAddCategory"])->name("ShowFormAddCategory");
        Route::post("/storeCategory",[CategoriesController::class,"StoreNewCategory"])->name("StoreNewCategory");
        Route::get("/editCategory/{id}",[CategoriesController::class,"ShowFormEditCategory"])->name("ShowFormEditCategory");
        Route::delete('Category/{id}', [CategoriesController::class,"DeleteCategory"])->name("deleteCategory");
        Route::post("/updateCategory/{id}" , [CategoriesController::class,"UpdateCategory"])->name("updateCategory");
        Route::get("/categories/search" , [CategoriesController::class,"searchProduct"])->name('admin.categories.search');

        //type
        Route::get("/type",[TypeController::class,"show_type"])->name("type.show");
        Route::get("/type/add",[TypeController::class,"show_add_type"])->name("type.show.formadd");
        Route::post("/type/create",[TypeController::class,"store_new_type"])->name("type.create");
        Route::get("/type/edit/{id}",[TypeController::class,"show_form_edit_type"])->name("type.show.formedit");
        Route::delete('/type/{id}', [TypeController::class,"delete_type"])->name("type.delete");
        Route::post("/type/store{id}" , [TypeController::class,"update_type"])->name("type.update");
        Route::get("/type/search" , [TypeController::class,"search_type"])->name('admin.type.search');

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
        //order 
        Route::get("/order",[OrderController::class,'index'])->name('admin.order');
        Route::get("/order/{id}",[OrderController::class,'detail'])->name("admin.order.detail");
        Route::get("/order/confirm/{id}",[OrderController::class,'confirm'])->name("admin.order.confirm");
    });

});