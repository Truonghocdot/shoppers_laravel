<?php

namespace App\Http\Controllers;
use App\Models\Oders ;
use App\Models\OderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $req){
        if($req->search){
            $wait = Oders::where('status',0)
            ->join('users','oders.uid','=','users.id')
            ->select('oders.*','name')
            ->where('name','LIKE','%' . $req->search . '%')
            ->orWhere('name','LIKE','%' . $req->search . '%')->get();
            $prepare = Oders::where('status',1)
            ->join('users','oders.uid','=','users.id')
            ->where('name','LIKE','%' . $req->search . '%')
            ->orWhere('name','LIKE','%' . $req->search . '%')
            ->select('oders.*','name')->get();
            $transport = Oders::where('status',2)
            ->join('users','oders.uid','=','users.id')
            ->where('name','LIKE','%' . $req->search . '%')
            ->orWhere('name','LIKE','%' . $req->search . '%')
            ->select('oders.*','name')->get();
            $completed = Oders::where('status',3)
            ->join('users','oders.uid','=','users.id')
            ->where('name','LIKE','%' . $req->search . '%')
            ->orWhere('name','LIKE','%' . $req->search . '%')
            ->select('oders.*','name')->get();
            return view('admin.order.index',compact('wait','prepare','transport','completed'));
        }else{
            $wait = Oders::where('status',0)->join('users','oders.uid','=','users.id')->select('oders.*','name')->get();
            $prepare = Oders::where('status',1)->join('users','oders.uid','=','users.id')->select('oders.*','name')->get();
            $transport = Oders::where('status',2)->join('users','oders.uid','=','users.id')->select('oders.*','name')->get();
            $completed = Oders::where('status',3)->join('users','oders.uid','=','users.id')->select('oders.*','name')->get();
            return view('admin.order.index',compact('wait','prepare','transport','completed'));
        }
    }

    public function confirm($id){
        $order = Oders::find($id);
        Oders::find($id)->update([
            'status' => $order->status + 1
        ]);
        return redirect()->route('admin.order');
    }

    public function detail($id){
        
        $orderItems = OderDetail::where("order_id",$id)
            ->join('products','oder_details.pro_id','=','products.id')
            ->select("products.*",'oder_details.size','oder_details.count')->get();
        return view('admin.order.detail',compact("orderItems"));
    }
}
