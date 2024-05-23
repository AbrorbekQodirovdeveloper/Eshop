<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
        public function productView(){
        $products = Product::get();
        return view('backend.product.productview', compact('products'));
    }
public function productAdd(){
        return view('backend.product.productadd');
    }
      public function productStore(Request $request){
              $request->validate(
            [
                'category_id' => 'required',
                'image' => 'required',
                'name' => 'required',
                'about' => 'required',
                'title' => 'required',
                'oldprice' => 'required',
                'price' => 'required',
                'discount' => 'required',
                'type' => 'required',

            ],
            [
                'category_id.required' => 'Input category_id',
                'image.required' => 'Upload image ',
                'name.required' => 'Input name',
                'about.required' => 'Input about',
                'title.required' => 'Input title',
                'oldprice.required' => 'Input oldprice',
                'price.required' => 'Input description',
                'type.required' => 'Input product type',

            ]
        );

        $image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/product/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);


        Product::create([

            'category_id' => $request->category_id,
            'image' => $save_url_image,
            'name' => $request->name,
            'about' => $request->about,
            'title' => $request->title,
            'oldprice' => $request->oldprice,
            'price' => $request->price,
            'discount' => $request->discount,
             'type' => $request->type,
        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }
         public function productEdit($id){
        $products = Product::where('id', $id)->first();
        return view('backend.product.productedit', compact('products'));
    }
 public function productUpdate(Request $request, $id){
        $request->validate(
            [
                'category_id' => 'required',
                'image' => 'required',
                'name' => 'required',
                'about' => 'required',
                'title' => 'required',
                'oldprice' => 'required',
                'price' => 'required',
                'discount' => 'required',
                 'type' => 'required',

            ],
            [
                'category_id.required' => 'Input category_id',
                'image.required' => 'Upload image ',
                'name.required' => 'Input name',
                'about.required' => 'Input about',
                'title.required' => 'Input title',
                'oldprice.required' => 'Input oldprice',
                'price.required' => 'Input description',
                'discount.required' => 'Input discaunt',
                'type.required' => 'Input product type',

            ]
        );
        $image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/product/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        $products = Product::where('id', $id)->first();


        $products->update([

            'category_id' => $request->category_id,
            'image' => $save_url_image,
            'name' => $request->name,
            'about' => $request->about,
            'title' => $request->title,
            'oldprice' => $request->oldprice,
            'price' => $request->price,
            'discount' => $request->discount,
            'type' => $request->type,

        ]);


        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);
    }
  public function productDelete($id){
        $products = Product::where('id', $id)->first();

        $products->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
