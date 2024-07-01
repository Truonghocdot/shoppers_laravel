<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\TypeProduct ;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ShopController extends Controller
{
    public function index(Request $req){
        if($req->has("title")){
            $categories = Categories::all();
            $type = TypeProduct::all();
            $products = Products::where("title",'LIKE','%' . $req['title'] . '%')->get();
            foreach ($type as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            foreach ($categories as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            return view("customer.products.index", compact('categories', 'products','type'));
        }else{
            $categories = Categories::all();
            $type = TypeProduct::all();
            $products = Products::all();
            foreach ($type as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            foreach ($categories as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            return view("customer.products.index", compact('categories', 'products','type'));
        }
    }

    public function search_shop(Request $req){
        $categories = Categories::all();
        $type = TypeProduct::all();
        $products = Products::all();
        if($req->has("arrange")){
            $products = Products::orderBy('title',strtolower($req['arrange']))->get();
            foreach ($categories as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            foreach ($type as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            return view("customer.products.index", compact('categories', 'products','type'));
        }elseif($req->has("type")){
            $type_id = 0 ;
            foreach($type as $item){        
                if($item->title == $req['type']){
                    global $type_id;
                    $type_id = $item->id;
                }
            }
            foreach ($type as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            $products = Products::where("type_id",$type_id)->get();
            foreach ($categories as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            return view("customer.products.index", compact('categories', 'products','type'));
        }elseif($req->has("price")){
            $products = Products::orderBy('price',strtolower($req['price']))->get();
            foreach ($categories as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            foreach ($type as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            return view("customer.products.index", compact('categories', 'products','type'));
        }elseif($req->has("categories")){
            $cat_id = 0 ;
            foreach($categories as $item){        
                if($item->title == $req['type']){
                    global $cat_id;
                    $cat_id = $item->id;
                }
            }
            $products = Products::where("cat_id",$cat_id)->get();
            foreach ($categories as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            foreach ($type as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            return view("customer.products.index", compact('categories', 'products','type'));
        }elseif($req->has('title')){
            $products = Products::where('title','LIKE','%'.$req->title .'%')->get();
            foreach ($categories as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            foreach ($type as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            return view("customer.products.index", compact('categories', 'products','type'));
        }elseif($req->has("arrange_price")){
            $input =explode('-',$req['arrange_price']);
            $products = Products::where("price",'>',str_replace("$",'',$input[0]))->where('price','<',str_replace("$",'',$input[1]))->get();
            foreach ($categories as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            foreach ($type as $item) {
                $count = $item->product()->count(); // Get the count of products directly
                $item->count_product = $count; 
            }
            return view("customer.products.index", compact('categories', 'products','type'));
        }
    }
}
    