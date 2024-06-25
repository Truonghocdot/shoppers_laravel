<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist ;

class WishlistController extends Controller
{
    public function index(){
        $uid = Auth::user()->id;
        $wishlist_items = Wishlist::join('products','wishlists.pro_id','=','products.id')->select('products.*','wishlists.id as wid','wishlists.uid','wishlists.pro_id')->where('uid',$uid)->get();
        return view('customer.wishlist.index',compact('wishlist_items'));
    }

    public function add_new(Request $req){
        $uid = Auth::user()->id;
        $wishlist = Wishlist::where('uid',$uid)->where('pro_id',$req->pro_id)->first();
        if($wishlist){
            return redirect()->route('wishlist');
        }else{
            Wishlist::create([
                'pro_id' => $req->pro_id,
                'uid' => $uid
            ]);
            return redirect()->route('wishlist');
        }
    }

    public function delete_item($id){
        Wishlist::find($id)->delete();
        return redirect()->route('wishlist');
    }
}
