<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories ;

class HomeController extends Controller
{
    public function index(){
        $categories = Categories::get();
        $products = Products::limit(5)->where('promotion_price',0)->get();
        $products_onsale = Products::limit(5)->where('promotion_price','>',0)->get();
        return view("customer.home.index",[
            "categories" => $categories,
            "products" => $products,
            'products_onsale' => $products_onsale
        ]);
    }
}
