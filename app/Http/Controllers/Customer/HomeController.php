<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories ;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Categories::get();
        $products = Products::limit(10)->get();
        return view("customer.home.index",[
            "categories" => $categories,
            "products" => $products
        ]);
    }
}
