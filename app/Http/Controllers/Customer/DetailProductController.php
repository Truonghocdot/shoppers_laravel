<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    public function index($id){
        $product = Products::find($id);
        $category = Products::find($id)->category()->first();
        $products = Categories::find($product->cat_id)->product()->where("id",'<>',$id)->get();
        return view("customer.product.index",compact('product','category','products'));
    }
}
