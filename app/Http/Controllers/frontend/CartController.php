<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
     public function addCart ( Request $request){
        $client = Session::get('client');
          if($client){
       $product = Product::where('id' , $request->product_id)->first();
             Cart::create([
                    'product_id' => $request->product_id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'oldprice' => $product->oldprice,
                    'image' => $product->image,
                    'discount' => $product->discount,
                    'client_id' => $client->id,
                    'size_id' => $request->sizes,
                    'color_id' => $request->color_id,
                    'count' => $request->count,
             ]);
             $notification = array(
                'message' => 'Added cart successfully!',
                'alert-type' => 'success'
            );
            }else{
                $notification = array(
                    'message' => 'You are not log inned!',
                    'alert-type' => 'warning'
                );
            }



         return redirect()->back()->with($notification);
    }

       public function deleteCart($id){
        $client = session('client');
          $cart = Cart::where('id' , $id)->first();
          if($client && $cart){
            $cart->delete();
            $notification = array(
                'message' => 'Delete successfully!',
                'alert-type' => 'warning'
            );
          }else{
            $notification = array(
                'message' => 'Delete  successfully!',
                'alert-type' => 'warning'
            );
          }
        return redirect()->back()->with($notification);
       }
}
