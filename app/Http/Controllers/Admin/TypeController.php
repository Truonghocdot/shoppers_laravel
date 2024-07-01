<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeProduct ;
use App\Http\Requests\Categories\NewCategory ;
use Illuminate\Http\Request;
use DateTime ;

class TypeController extends Controller
{
    public function show_type(){
        $TypeProduct = TypeProduct::get();
        $title = '';
        foreach ($TypeProduct as $item) {
            $date = new DateTime($item->created_at);
            $item->created_at = $date->format('Y-m-d H:i:s'); 
        }
        return view("admin.type.index",compact("TypeProduct",'title'));
    }

    public function show_add_type(){
        return view("admin.type.create");
    }

    public function store_new_type( NewCategory $request ){
        $request->validated();
        $request = $request->toArray();
        $targetPath = public_path('images/type');
        $imageName = $request['thumbnail']->getClientOriginalName();
        $request['thumbnail']->move($targetPath,$imageName);
        $result = TypeProduct::create([
            "title"=>$request['title'],
            "thumbnail"=>$imageName
        ]);
        return redirect()->route("type.show");
    }

    public function delete_type($id){
        TypeProduct::find($id)->delete();
        return redirect()->route("show.type");
    }

    public function show_form_edit_type($id){
        $type = TypeProduct::find($id);
        return view("admin.type.edit",compact("type"));
    }
    
    public function update_type ( NewCategory $request, $id){
        $request->validated();
        $thumbnailName = $request->file("thumbnail")->getClientOriginalName();
        $imgPath = public_path('images/type');
        $request->file("thumbnail")->move($imgPath,$thumbnailName);
        TypeProduct::find($id)->update([
            'title'=>$request->title,
            'thumbnail'=> $thumbnailName
        ]);

        return redirect()->route("type.show");
    }

    public function search_type(Request $req){
        $TypeProduct = TypeProduct::where('title','LIKE','%' . $req->title . '%')->get();
        $TypeProduct = $TypeProduct->all();
        $title = $req->title;
        return view("admin.type.index",compact('TypeProduct','title'));
    }
}
