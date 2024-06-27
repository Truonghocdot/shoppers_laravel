<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Symfony\Component\HttpFoundation\Response;

class AddToCartFromWWishList
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $item_wishlist = Wishlist::where('pro_id',$request->pro_id)->first();
        if($item_wishlist != null){
            Wishlist::where('pro_id',$request->pro_id)->delete();
            return $next($request);
        }else{
            return $next($request);
        }
    }
}
