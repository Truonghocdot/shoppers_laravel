<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index(){
        $daily = Coupon::where('role',0)->get();
        $byUser = Coupon::where('role',1)->get();
        return view('admin.coupon.index',compact('daily','byUser'));
    }

    public function addNewDaily(Request $req){
        Coupon::create([
            'content' => $req->content,
            'value' => $req->percent,
            'role' => 0,
            'count' => $req->count,
            'code' => rand(100000,999999)
        ]);

        return redirect()->route('admin.coupon');
    }

    public function addNewByUser(Request $req){
        Coupon::create([
            'content' => $req->content,
            'value' => $req->percent,
            'role' => 1,
            'count' => $req->count,
            'code' => rand(100000,999999)
        ]);

        return redirect()->route('admin.coupon');
    }

    public  function deleteCoupon($id){
        Coupon::find($id)->delete();
        
        return redirect()->route('admin.coupon');
        
    }
}
