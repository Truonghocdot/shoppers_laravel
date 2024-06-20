<?php

namespace App\Http\Controllers; 
use App\Http\Requests\Auth\UserRegister ;
use App\Http\Requests\Auth\UserLogin ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthController extends Controller
{
    public function  ShowLogin() {
        return view('authentication.login.index')->with("error","");
    }

    public function ShowRegister() {
        return view('authentication.register.index');
    }

    public function CreateAccount(UserRegister $request){
        $request->validated();
        User::create([
            "phone" => $request->phone,
            "name" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        return redirect()->route("ShowLogin");
    }

    public function LogonAccount(UserLogin $request){    
        $request->validated();
        $credentials = $request->all('email',"password");
        if(Auth::attempt($credentials)){
            $user = User::where("email",$credentials['email'])->first();
            if($user->role == '0'){
                return redirect("/");
            }else{
                return redirect("/admin/dashboard");
            }
        }else{
            return view("authentication.login.index")->with("error","Password or email is incorrect!");
        };
    }
    
    public function Logout(){
        Auth::logout();
        return redirect("/");
    }
}
