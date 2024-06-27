<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $daily = Coupon::where('role',0)->get();
        $byUser = Coupon::where('role',1)->get();
        return view('customer.coupon.index',compact('daily','byUser'));
    }
}
