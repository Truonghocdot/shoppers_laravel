<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth ; 
use App\Http\Requests\Payment; 
use App\Models\CouponUsed ;
use App\Models\Oders ;
use App\Models\Products ;
use App\Models\OderDetail ;
use App\Models\Carts ;
use App\Models\CartItems ;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(){
        $uid = Auth::user()->id ;
        $cart = Carts::where('uid',$uid)->first();
        $order = new Oders();
        $total_price = $cart->total;
        $cart_item = Carts::where('id',$cart->id)->first()->cart_items()->join('products','cart_items.pro_id','=','products.id')->select('cart_items.size','cart_items.count','products.title','products.promotion_price','products.price')->get() ;
        $coupon = CouponUsed::where('cart_id',$cart->id)->join('coupons','coupon_useds.coupon_id','=','coupons.id')->select('coupons.content','coupons.value')->get();
        return view('customer.checkout.index',compact("total_price",'cart_item','coupon'));
    }

    public function payment(Payment $req){
        $req->validated();
        $uid = Auth::user()->id ;
        $cart = Carts::where('uid',$uid)->first();
        $address = $req->c_province . '/' .$req->c_district . '/'. $req->c_ward ;
        $fullname = $req->c_fname . ' '. $req->c_lname ;
        $total_price = $cart->total;
        $cart_item = Carts::where('id',$cart->id)->first()->cart_items()->join('products','cart_items.pro_id','=','products.id')->select('cart_items.size','cart_items.count','products.title','products.promotion_price','products.price')->get() ;
        $coupon = CouponUsed::where('cart_id',$cart->id)->join('coupons','coupon_useds.coupon_id','=','coupons.id')->select('coupons.content','coupons.value')->get();
        if($cart->total <= 0){
            return redirect()->back()->withErrors('invalid','You must buy something!');
        }
        if($req->payment == 'vnpay'){
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = 'http://127.0.0.1:8000/thanksyou';
            $vnp_TmnCode = "2C04KA3S";//Mã website tại VNPAY 
            $vnp_HashSecret = "DN3T8H4ISC75AMP8O0WNXT7VLDEO4MG4"; //Chuỗi bí mật
            $vnp_TxnRef = $cart->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Name user: '.$fullname.'-'.'Address: '.$address.'-'.'Phone :'.$req->c_phone;
            $vnp_OrderType = 'Payment by: VNpay';
            $vnp_Amount =  10000 * $cart->total ;
            $vnp_Locale = 'VI';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            );
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                Mail::to($req['c_email_address'])->send(new MailNotify($cart_item, $fullname, $total_price, $coupon));
                $newOrder = Oders::create([
                    'status'=> 0,
                    'uid' => $uid,
                    'address'=> $address ,
                    'userphone' => $req->c_phone ,
                    'full_name' => $fullname ,
                    'email' => $req->c_email_address,
                    'total_money' => $cart->total,
                    'payment' => 'vnpay',
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
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }else{
            Mail::to($req['c_email_address'])->send(new MailNotify($cart_item, $fullname, $total_price, $coupon));
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
