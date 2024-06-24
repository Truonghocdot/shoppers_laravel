<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $categories = Categories::all();
        $products = Products::all();
        foreach ($categories as $item) {
            $count = $item->product()->count(); // Get the count of products directly
            $item->count_product = $count; 
        }
        return view("customer.products.index", compact('categories', 'products'));
    }
    
    public function fillter_category($title){
        $categories = Categories::all();
        $cat_id = 0 ;
        foreach($categories as $item){        
            if($item->title == $title){
                global $cat_id;
                $cat_id = $item->id;
            }

        }
        $products = Products::where("cat_id",$cat_id)->get();
        foreach ($categories as $item) {
            $count = $item->product()->count(); // Get the count of products directly
            $item->count_product = $count; 
        }
        return view("customer.products.index", compact('categories', 'products'));
    }

    public function fillter_price($type){
        $categories = Categories::all();
        $products = Products::orderBy('price',$type)->get();
        foreach ($categories as $item) {
            $count = $item->product()->count(); // Get the count of products directly
            $item->count_product = $count; 
        }
        return view("customer.products.index", compact('categories', 'products'));
    }    

    public function fillter_name($type){
        $categories = Categories::all();
        $products = Products::orderBy('title',$type)->get();
        foreach ($categories as $item) {
            $count = $item->product()->count(); // Get the count of products directly
            $item->count_product = $count; 
        }
        return view("customer.products.index", compact('categories', 'products'));
    }    

    public function fillter_range_price(Request $req){
        $prices = explode("-",$req->text);
        $price_1 = (int)str_replace("$","", $prices[0]);
        $price_2 = (int)str_replace("$","", $prices[1]);
        $categories = Categories::all();
        $products = Products::whereBetween('price',[$price_1, $price_2])->get();
        foreach ($categories as $item) {
            $count = $item->product()->count(); // Get the count of products directly
            $item->count_product = $count; 
        }
        return view("customer.products.index", compact('categories', 'products'));
    }
}
    