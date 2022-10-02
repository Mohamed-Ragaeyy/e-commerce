<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class usercontroller extends Controller
{
    public function redirect(){
        $user = Auth::user();
        $products = product::paginate(2);

        if(Auth::user()){
            if($user->role == 'user'){
                return view('user/product' , compact('products'));
             }
             elseif($user->role == 'admin'){
                return view('admin/home');
             }
        }
       else{
        return redirect('login');
        }


    }


    public function index(){
        return view('user.home');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }


    public function addcart(Request $request , $id){
     $user = Auth::user();
         if(Auth::user()){
            $product = product::find($id);
             $cart = Cart::create(['product_id' => $product->id, "user_id" => $user->id,  'price' => $product->price, 'quantity' => $request->quantity]);
             return redirect()->back()->with('message' , "product added");;
         }
         else{
            return redirect('login');
         }
    }

    public function showcart(){
     $user = Auth::user();
     $cart = Cart::where("user_id" , $user->id)->get();
     $sum = 0;
     foreach($cart as $value){
     $sum += $value->quantity * $value->price; //
     }
     return view("user.showcart" , compact("cart" , "sum"));
    }

    public function Re_autoIncrement($table){
        DB::statement("SET @count = 0 ;");
        DB::statement("Update `$table` SET `$table`.`id`= @count:= @count +1;");
        DB::statement("ALTER TABLE `$table` AUTO_INCREMENT = 1;");
    }

    public function delete($id){
        DB::table('carts')->where('id',"=", $id)->delete();
        return redirect()->back()->with('message' , "product deleted");
    }

}
