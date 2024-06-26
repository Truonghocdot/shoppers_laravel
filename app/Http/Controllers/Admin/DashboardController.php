<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Products;
use App\Models\Oders;
use App\Models\Categories;

class DashboardController extends Controller
{
    public function index(){
        // count 
        $countUsers = User::count();
        $countProducts = Products::count();
        $countOrders = Oders::count() ;
        $countCategories = Categories::count();
        // information of admin
        $admin = Auth::user() ;
        return view("admin.dashboard.index",[
            "countUsers" => $countUsers,
            "countProducts" => $countProducts,
            "countBlogs" => 0,
            "countCategories" => $countCategories,
            "countOrders" =>$countOrders,
        ]);
    }
}
