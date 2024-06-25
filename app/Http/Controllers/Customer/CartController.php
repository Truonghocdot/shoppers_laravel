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
        $cart_items = CartItems::join('products','cart_items.pro_id','=','products.id')->select('products.title','cart_items.id','products.price','cart_items.count','products.image','cart_items.size')->get();
        $total_price = 0;
        foreach($cart_items as $item){
            $total_price =$total_price + $item->price * $item->count;
        }
        return view('customer.cart.index',['cart_items' => $cart_items,'total' => $total_price]);
    }

    public function addCartItem(NewCartItem $req){
        $id_user = Auth::user()->id ;
        $pro_id = $req->all()['pro_id'];
        $shop_sizes = $req->all()['shop-sizes'];
        $cart_id = Carts::where('uid',$id_user)->first()->id;
        $cart_items = CartItems::where('cart_id',$cart_id)->where('pro_id',$pro_id)->where("size",$shop_sizes)->first();
        if($cart_items != null){
            Cartitems::find($cart_items->id)->update([
                'count' => (int)$cart_items->count + (int)  $req->all()['count'],
            ]);

            return redirect()->route('cart.index');
        }else{
            CartItems::create([
                'pro_id' => $pro_id,
                'cart_id' => $cart_id->id,
                'count' => $req->all()['count'],
                'size' => $shop_sizes
            ]);

            return redirect()->route('cart.index');
        }
    }

    public function updateCart(Request $req){
        $id_user = Auth::user()->id;
        $cart_id = Carts::where('uid',$id_user)->first()->id;
        $cart_items = CartItems::where('cart_id',$cart_id)->get();
        foreach($cart_items as $item){
            if($req->all()[$item->id]){
                CartItems::find($item->id)->update([
                    'count' => $req->all()[$item->id],
                ]);
            }
        }
        return redirect()->route('cart.index');
    }

    public function deleteCartItem($id){
        CartItems::find($id)->delete();
        return redirect()->route('cart.index');
    }
}
