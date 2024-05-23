<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Hotitem;
use App\Models\Main;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OurBlog;
use App\Models\Product;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{
     public function index(){
         $client = Session::get('client');
         $categorys = Category::get();
         $mains = Main::first();
         $collections = Collection::get();
         $hotitems = Hotitem::get();
         $ourblogs = OurBlog::get();
         $offers = Offer::get();
        $cart = Cart::query();
        $carts = Cart::query();
        if ($client) {

            $carts = Cart::where('client_id', $client->id)->get();
        } else {
            $cart = null;
            $carts = [];
        }

   return view('frontend.index' , compact('client', 'categorys' , 'collections' , 'hotitems', 'ourblogs', 'offers' , 'carts' , 'cart' , 'mains'));
  }

 public function shopdetailpage($product_id)
    {
        $client = Session::get('client');
        $products = Product::where('id', $product_id)->with("category", "sizes", "images", "reviews")->first();
        $cart = Cart::query();
        $carts = Cart::query();
        if ($client) {
            $cart = $cart->where('client_id', $client->id)->where('product_id', $product_id)->first();
            $carts = Cart::where('client_id', $client->id)->get();
        } else {
            $cart = null;
            $carts = [];
        }
        $product = Product::get();
        $product = $product->shuffle()->take(5);
        $mains = Main::first();
        $product_ids = Product::get();

        return view('frontend.shopdetail', compact('cart', 'carts',  'products',  'product', 'mains',  'product_ids'));
    }

    public function cartPage()
    {
        $mains = Main::first();
        $client = Session::get('client');
        $carts = Cart::with('product', 'color', 'size');
        $cart = Cart::query();
        $carts = Cart::query();
        if ($client) {
            // $cart = $cart->where('client_id' , $client->id)->where('product_id' , $product_id)->first();
            $carts = Cart::where('client_id', $client->id)->get();
        } else {
            $cart = null;
            $carts = [];
        }
        return view('frontend.cart', compact('carts', 'client', 'mains'));
    }

 public function orderPage()
    {
        $mains = Main::first();
        $categorys = Category::get();
        $client = Session::get('client');
        $orders = Order::with('product', 'color', 'size');
        $orders = Order::query();
        $orders = Order::query();
        if ($client) {
            // $cart = $cart->where('client_id' , $client->id)->where('product_id' , $product_id)->first();
            $orders = Order::where('client_id', $client->id)->with('products')->get();
        } else {
            $orders = null;
            $orders = [];
        }
        $carts = Cart::with('product', 'color', 'size');
        $cart = Cart::query();
        $carts = Cart::query();
        if ($client) {
            // $cart = $cart->where('client_id' , $client->id)->where('product_id' , $product_id)->first();
            $carts = Cart::where('client_id', $client->id)->get();
        } else {
            $cart = null;
            $carts = [];
        }
        return view('frontend.order', compact('orders', 'client', 'categorys', 'mains', 'carts'));
    }
    public function contact(){
        $client = Session::get('client');
       $mains = Main::first();
               $carts = Cart::with('product', 'color', 'size');
        $cart = Cart::query();
        $carts = Cart::query();
        if ($client) {
            // $cart = $cart->where('client_id' , $client->id)->where('product_id' , $product_id)->first();
            $carts = Cart::where('client_id', $client->id)->get();
        } else {
            $cart = null;
            $carts = [];
        }
    return view('frontend.contact' , compact('mains' , 'carts' , 'client'));
}
     public function blog(){
       $client = Session::get('client');
       $mains = Main::first();
               $carts = Cart::with('product', 'color', 'size');
        $cart = Cart::query();
        $carts = Cart::query();
        if ($client) {
            // $cart = $cart->where('client_id' , $client->id)->where('product_id' , $product_id)->first();
            $carts = Cart::where('client_id', $client->id)->get();
        } else {
            $cart = null;
            $carts = [];
        }
    return view('frontend.blog' , compact('mains' , 'carts' , 'client'));
}
      public function wishPage()
    {
        $mains = Main::first();
        $product = Product::get();
        $client = Session::get('client');
        $wishs = Wish::with('product', 'color', 'size')->get();
        $wishs = Wish::query();
        if ($client) {
            $wishs = $wishs->where('client_id', $client->id)->get();
        } else {
            $wishs = null;
            $wishs= [];
        }
        $cart = Cart::query();
        $carts = Cart::query();
        if ($client) {

            $carts = Cart::where('client_id', $client->id)->get();
        } else {
            $cart = null;
            $carts = [];
        }
        return view('frontend.wish', compact('client', 'mains', 'product', 'wishs', 'carts'));
    }
}
