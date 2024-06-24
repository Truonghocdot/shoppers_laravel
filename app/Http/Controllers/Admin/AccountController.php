<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        $admin = User::where("role",1)->get() ;
        $customer = User::where("role",0)->get();
        $ban = User::where("role",3)->get();
        return view("admin.account.index",compact("admin","customer",'ban'));
    }

    public function deleteAccount($id){
        User::find($id)->delete();
        return redirect()->route("showAccount") ;
    }

    public function banAccount($id){
        $user = User::find($id) ;
        $user->role = 3;
        $user->save();
        return redirect()->back();
    }

    public function RemoveBanAccount($id){
        $user = User::find($id) ;
        $user->role = 0;
        $user->save();
        return redirect()->back();
    }

    public function showProfile($id){
        $user = User::find($id);
        return view("admin.account.profile",compact('user'));
    }
}
