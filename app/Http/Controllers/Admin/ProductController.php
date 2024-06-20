<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products ;
use App\Http\Requests\Product\NewProduct;

class ProductController extends Controller
{
    public function ShowProducts(){
        $products = Products::get();
        $products = $products->all();
        return view("admin.product.index",compact('products'));
    }

    public function ShowFormAddProduct()  {
        return view('admin.product.create');
    }

    public function StoreNewProduct(NewProduct $request) {
        $request->validated();
        $request = $request->toArray();
        $targetPath = public_path('images/products');
        $image = explode('.',$request['image']->getClientOriginalName());
        $imageName = md5(time() . $image[0]) . '.' . $image[1];
        $request['image']->move($targetPath,$imageName);
    }

    public function ShowFormEditProduct() {
        
    }
    
    public function DeleteProduct() {
        
    }

}
