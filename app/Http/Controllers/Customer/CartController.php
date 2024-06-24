<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Cart\NewCartItem;
use App\Models\Carts ;
use App\Models\User;
use App\Models\CartItems ;
 

class CartController extends Controller
{
    public function index(){
        $id = Auth::user()->id ;
        $cart_id = User::find($id)->cart()->first()->id ;
        $cart_items = CartItems::join('products','cart_items.pro_id','=','products.id')->select('products.title','products.price','cart_items.count','products.image')->get();

        return view('customer.cart.index',[
            'cart_items' => $cart_items
        ]);
    }

    public function addCartItem(NewCartItem $req){
        $id_user = Auth::user()->id ;
        $pro_id = $req->all()['pro_id'];
        $shop_sizes = $req->all()['shop-sizes'];
        $cart_id = Carts::where('uid',$id_user)->first();
        dd($cart_id->all);
        $cart_items = CartItems::where('cart_id',$cart_id)->where('pro_id',$pro_id)->where("size",$shop_sizes)->get();
        if(count($cart_items) != 0){

        }else{
            CartItems::create([
                'pro_id' => $pro_id,
                'cart_id' => $cart_id->id,
                'count' => $req->all()['count'],
                'size' => $shop_sizes
            ]);
        }
    }

}
