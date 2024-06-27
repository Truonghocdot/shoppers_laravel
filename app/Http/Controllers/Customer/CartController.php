<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Cart\NewCartItem;
use App\Models\Carts ;
use App\Models\User;
use App\Models\Coupon ;
use App\Models\CouponUsed ;
use App\Models\CartItems ;

class CartController extends Controller
{
    public function index(){
        $id = Auth::user()->id ;
        $cart = new Carts();
        $cart_id = User::find($id)->cart()->first()->id ;
        $cart_items = CartItems::join('products','cart_items.pro_id','=','products.id')->select('products.title','products.promotion_price','cart_items.id','products.price','cart_items.count','products.image','cart_items.size')->get();
        $total_price = 0 ;
        $coupon = $cart::find($cart_id)->couponUsed()->join('coupons','coupon_useds.coupon_id','=','coupons.id')->select('coupons.value','coupons.content')->get();
        foreach($cart_items as $item){
            if($item->promotion_price >0){
                $total_price =$total_price + $item->promotion_price * $item->count;
            }else{
                $total_price =$total_price + $item->price * $item->count;
            }
        }
        $total_discount = 0 ;
        foreach ($coupon as $item ) {
            $total_discount = $total_discount + ($total_price*$item->value)/100 ; 
        }
        $total_price = $total_price - $total_discount ;
        $cart::find($cart_id)->update([
            'total' => $total_price
        ]);
        return view('customer.cart.index',['cart_items' => $cart_items,'total' => $total_price,'coupon' => $coupon]);
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
                'cart_id' => $cart_id,
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

    public function add_coupon(Request $req) {
        $coupon = new Coupon();
        $couponUsed = new CouponUsed();
        $id_user = Auth::user()->id;
        $cart_id = Carts::where('uid',$id_user)->first()->id;
        $check_coupon = $coupon::where('code', $req->code)->first();
        if($check_coupon == null || $check_coupon->count <= 0){
            return back()->withErrors(['valid' => 'This coupon was expired or not exist!'])->withInput();
        }else{
            $check_used = $couponUsed::where('cart_id',$cart_id)->where("coupon_id",$check_coupon->id)->first() ;
            if($check_used != null){
                return back()->withErrors(['valid' => 'You have just used this coupon!'])->withInput();
            }else{
                $couponUsed::create([
                    'cart_id' => $cart_id,
                    'coupon_id' => $check_coupon->id
                ]);
                Coupon::find($check_coupon->id)->update([
                    'count' => $check_coupon->count - 1 
                ]);
                return redirect()->route("cart.index");
            }
        }
    }
}
