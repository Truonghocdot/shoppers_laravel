<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products ;
use App\Http\Requests\Product\NewProduct;
use App\Models\Categories ;

class ProductController extends Controller
{
    public function ShowProducts(){
        $products = Products::get();
        $products = $products->all();
        return view("admin.product.index",compact('products'));
    }

    public function ShowFormAddProduct()  {
        $categories = Categories::get();
        return view('admin.product.create',
            [
                "categories"=> $categories
            ]
    );
    }

    public function StoreNewProduct(NewProduct $request) {
        $request->validated();
        $request = $request->toArray();
        $targetPath = public_path('images/products');
        $image = explode('.',$request['image']->getClientOriginalName());
        $imageName = md5(time() . $image[0]) . '.' . $image[1];
        $request['image']->move($targetPath,$imageName);
        Products::create([
            "title"=>$request['title'],
            "description"=>$request['description'],
            "count"=>$request['count'],
            "price"=>$request['price'],
            'cat_id'=>$request['category'],
            "promotion_price"=>$request['promotion_price'],
            "image"=>$imageName
        ]);

        return redirect()->route("ShowProducts");
    }

    public function ShowFormEditProduct($id) {
        $categories = Categories::get();
        $product = Products::find($id)->toArray();
        return view('admin.product.edit',[
            "id" => $product['id'],
            "price" => $product['price'],
            "title" => $product['title'],
            "description" => $product['description'],
            "count" => $product['count'],
            "promotion_price" => $product['promotion_price'],
            "categories" => $categories
        ]);
        
    }
    
    public function DeleteProduct( $id) {
        $result = Products::find($id)->delete();
        return redirect()->back();
    }

    public function UpdateProduct(NewProduct $request ,$id){
        $request->validated();
        $request = $request->toArray();
        $categories = Categories::get();
        $targetPath = public_path('images/products');
        $image = explode('.',$request['image']->getClientOriginalName());
        $imageName = md5(time() . $image[0]) . '.' . $image[1];
        $request['image']->move($targetPath,$imageName);
        $result = Products::find($id)->update([
            "title"=>$request['title'],
            "description"=>$request['description'],
            "count"=>$request['count'],
            "price"=>$request['price'],
            'cat_id'=>$request['category'],
            "promotion_price"=>$request['promotion_price'],
            "image"=>$imageName
        ]);
        return redirect()->route("ShowProducts");
    }

}
