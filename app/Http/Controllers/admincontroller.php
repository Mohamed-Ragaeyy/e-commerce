<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admincontroller extends Controller
{
    public function productform(){
     return view('admin.uploadproduct');
    }

    public function addproduct(Request $request){
      $cats = category::where('name', '=', $request->title)->get();
      $request->validate(['title'=>"required" , 'price'=>"required" , 'desc'=>"required" , 'quantity'=>"required" , 'img'=>"required"]);
      $file = $request ->file('img');
      $imgextion = $file->getClientOriginalExtension();
      $folder = $file->move(public_path().'/admin/assets/images/product-img',time().'.'.$imgextion);
      foreach($cats as $value)
      Product::create(['category_id' =>$value->id,'title'=>$request->title , 'price'=>$request->price , 'desc'=>$request->desc , 'quantity'=>$request->quantity , 'img'=>$folder]);
      return redirect()->back()->with('message' , "product added");
    }

    public function showproduct(){
        $products = Product::all();
    return view('admin.showproduct' , compact('products'));
    }

    public function delete($id){
        DB::table('Products')->where('id',"=", $id)->delete();
        return redirect()->back()->with('message' , "product deleted");
    }
}
