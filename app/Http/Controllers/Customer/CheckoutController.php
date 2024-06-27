<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth ; 
use Illuminate\Http\Request;
use App\Http\Requests\Payment; 
use App\Models\CouponUsed ;
use App\Models\Oders ;
use App\Models\Products ;
use App\Models\OderDetail ;
use App\Models\Carts ;
use App\Models\CartItems ;

class CheckoutController extends Controller
{
    public function index(){
        $uid = Auth::user()->id ;
        $cart = Carts::where('uid',$uid)->first();
        $order = new Oders();
        $total_price = $cart->total;
        $cart_item = Carts::where('id',$cart->id)->first()->cart_items()->join('products','cart_items.pro_id','=','products.id')->select('cart_items.size','cart_items.count','products.title','products.promotion_price','products.price')->get() ;
        $coupon = CouponUsed::where('cart_id',$cart->id)->join('coupons','coupon_useds.coupon_id','=','coupons.id')->select('coupons.content','coupons.value')->get();;
        return view('customer.checkout.index',compact("total_price",'cart_item','coupon'));
    }

    public function payment(Payment $req){
        $req->validated();
        $uid = Auth::user()->id ;
        $cart = Carts::where('uid',$uid)->first();
        $address = $req->c_province . '/' .$req->c_district . '/'. $req->c_ward ;
        $fullname = $req->c_fname . ' '. $req->c_lname ;
        if($req->payment == 'vnpay'){
        }else{
            $newOrder = Oders::create([
                'status'=> 0,
                'uid' => $uid,
                'address'=> $address ,
                'userphone' => $req->c_phone ,
                'full_name' => $fullname ,
                'email' => $req->c_email_address,
                'total_money' => $cart->total,
                'payment' => 'postpaid',
                'notes' => $req->c_order_notes ,
            ]);
            $cartItems = CartItems::where('cart_id',$cart->id)->get();
            foreach ($cartItems as $item) {
                OderDetail::create([
                    'order_id' => $newOrder->id,
                    'pro_id' => $item->pro_id,
                    'count' => $item->count ,
                    'size' => $item->size

                ]);
                $count_pro = Products::find($item->pro_id)->count ;
                Products::find($item->pro_id)->update([
                    'count' => $count_pro - $item->count
                ]);
            }
            Carts::create([
                'uid' => $uid
            ]);
            Carts::find($cart->id)->delete();
            CartItems::where("cart_id",$cart->id)->delete();
            return redirect()->route('thanksyou');
        }
    }

    public function thanksyou(){
        return view("customer.thanksyou");
    }
}
