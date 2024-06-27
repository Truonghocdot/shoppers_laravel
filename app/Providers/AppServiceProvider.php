<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts;
use App\Models\CartItems;
use App\Models\Coupon;
use App\Models\Wishlist;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        view()->composer(['*'], function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $user_id = $user->id;
                $cart = Carts::where('uid', $user_id)->first();
                $countCartItems = $cart ? CartItems::where('cart_id', $cart->id)->count() : 0;
                $countWishlistItems = Wishlist::where('uid', $user_id)->count();

                $view->with(compact('countCartItems', 'user', 'countWishlistItems'));
            }
        });
    }
}
