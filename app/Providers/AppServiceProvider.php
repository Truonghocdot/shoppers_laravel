<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts;
use App\Models\CartItems;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['*'], function ($view) {
           if(Auth::check()){
                $user = Auth::user();
                $user_id = Auth::user()->id ;
                $cart_id = Carts::where('uid', $user_id)->first()->id;
                $countCartItems = CartItems::where('cart_id',$cart_id)->count() ;
                $view->with(compact('countCartItems','user'));
            }else{

            } 
        });
    }
}
