<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{
          public function productimageView(){
        $productimages = ProductImage::get();
        return view('backend.productimage.productimageview', compact('productimages'));
    }
public function productimageAdd(){
        return view('backend.productimage.productimageadd');
    }
      public function productimageStore(Request $request){
              $request->validate(
            [

                'image' => 'required',
                'product_id' => 'required',



            ],
            [
                'image.required' => 'Upload image ',
                'product_id.required' => 'Input product id',



            ]
        );

        $image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/productimage/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        ProductImage::create([


            'image' => $save_url_image,
            'product_id' => $request->product_id,
        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.productimage')->with($notification);
    }
         public function productimageEdit($id){
        $productimages = ProductImage::where('id', $id)->first();
        return view('backend.productimage.productimageedit', compact('productimages'));
    }
 public function productimageUpdate(Request $request, $id){
        $request->validate(
            [

                'image' => 'required',
                'product_id' => 'required',
            ],
            [

                'image.required' => 'Upload image ',
                'product_id.required' => 'Input product id',
            ]
        );
        $image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/productimage/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        $productimages = ProductImage::where('id', $id)->first();

        $productimages->update([


            'image' => $save_url_image,
            'product_id' => $request->product_id,

        ]);

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.productimage')->with($notification);
    }
  public function productimageDelete($id){
        $productimages = ProductImage::where('id', $id)->first();

        $productimages->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
