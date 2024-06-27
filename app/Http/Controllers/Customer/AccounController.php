<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\OderDetail;
use App\Models\Oders;


class AccounController extends Controller
{
    public function index(){
        $user = Auth::user();

        $orderItem = Oders::where('uid','=',$user->id)
            ->join('oder_details','oders.id','=','oder_details.order_id')
            ->select('oder_details.pro_id','oder_details.size','oder_details.count')
            ->join('products','oder_details.pro_id','=','products.id')
            ->select('oder_details.pro_id','oder_details.order_id','oder_details.size','oder_details.count','products.title','products.price','products.promotion_price','products.image','oders.payment','oders.total_money')->get();
        $order = Oders::where('uid','=',$user->id)->get();   
        return view('customer.profile.index',compact('user','order','orderItem'));
    }

    public function cancel_order(Request $req){
        Oders::where('id',(int)$req->order_id)->delete();
        return redirect()->route('profile');
    }

    public function confirms_success(Request $req){
        Oders::find((int)$req->order_id)->update([
            'status' => 3
        ]);

        return redirect()->route('profile');
    }
}
