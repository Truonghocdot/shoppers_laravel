<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Categories\NewCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function ShowCategories(){
        $categories = Categories::get()->toArray();
        return view("admin.category.index",compact("categories"));
    }

    public function ShowFormAddCategory(){
        return view("admin.category.create");
    }

    public function StoreNewCategory( NewCategory $request ){
        $request->validated();
        $request = $request->toArray();
        $targetPath = public_path('images/categories');
        $imageName = $request['thumbnail']->getClientOriginalName();
        $request['thumbnail']->move($targetPath,$imageName);
        $result = Categories::create([
            "title"=>$request['title'],
            "thumbnail"=>$imageName
        ]);
        return redirect()->route("ShowCategories");
    }

    public function DeleteCategory($id){
        Categories::find($id)->delete();
        return redirect()->route("ShowCategories");
    }

    public function ShowFormEditCategory($id){
        $cat = Categories::find($id);
        return view("admin.category.edit",compact("cat"));
    }
    
    public function UpdateCategory ( NewCategory $request, $id){
        $request->validated();
        $thumbnailName = $request->file("thumbnail")->getClientOriginalName();
        $imgPath = public_path('images/categories');
        $request->file("thumbnail")->move($imgPath,$thumbnailName);
        Categories::find($id)->update([
            'title'=>$request->title,
            'thumbnail'=> $thumbnailName
        ]);

        return redirect()->route("ShowCategories");
    }
}
