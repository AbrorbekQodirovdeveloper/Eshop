<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProductSetColor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductSetColorController extends Controller
{
                   public function productsetcolorView(){
            $productsetcolors = ProductSetColor::get();
        return view('backend.productsetcolor.view', compact('productsetcolors'));
    }
public function productsetcolorAdd(){
        return view('backend.productsetcolor.add');
    }
      public function productsetcolorStore(Request $request){
              $request->validate(
            [

                'color_id' => 'required',
                'product_id' => 'required',
            ],
            [
                'color_id.required' => 'Input color_id',
                'product_id.required' => 'Input product_id',
            ]
        );


        ProductSetColor::create([
            'color_id' => $request->color_id,
            'product_id' => $request->product_id,
        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.productsetcolor')->with($notification);
    }
         public function productsetcolorEdit($id){
        $productsetcolors = ProductSetColor::where('id', $id)->first();
        return view('backend.productsetcolor.edit', compact('productsetcolors'));
    }
 public function productsetcolorUpdate(Request $request, $id){
        $request->validate(
            [


                'color_id' => 'required',
                'product_id' => 'required',
            ],
            [


                'color_id.required' => 'Input color id',
                'product_id.required' => 'Input product id',
            ]
        );


        $productsetcolors = ProductSetColor::where('id', $id)->first();

        $productsetcolors->update([



            'color_id' => $request->color_id,
            'product_id' => $request->product_id,

        ]);

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.productsetcolor')->with($notification);
    }
  public function productsetcolorDelete($id){
        $productsetcolors = ProductSetColor::where('id', $id)->first();

        $productsetcolors->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

    return redirect()->back()->with($notification);
}
}
