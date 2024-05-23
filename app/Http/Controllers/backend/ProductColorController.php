<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
           public function productcolorView(){
            $productcolors = ProductColor::get();
        return view('backend.productcolor.productcolorview', compact('productcolors'));
    }
public function productcolorAdd(){
        return view('backend.productcolor.productcoloradd');
    }
      public function productcolorStore(Request $request){
              $request->validate(
            [

                'color' => 'required',
            ],
            [
                'color.required' => 'Input color',
            ]
        );


        ProductColor::create([
            'color' => $request->color,
        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.productcolor')->with($notification);
    }
         public function productcolorEdit($id){
        $productcolors = ProductColor::where('id', $id)->first();
        return view('backend.productcolor.productcoloredit', compact('productcolors'));
    }
 public function productcolorUpdate(Request $request, $id){
        $request->validate(
            [


                'color' => 'required',
            ],
            [


                'color.required' => 'Input color id',
            ]
        );


        $productcolors = ProductColor::where('id', $id)->first();

        $productcolors->update([



            'color' => $request->color,

        ]);

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.productcolor')->with($notification);
    }
  public function productcolorDelete($id){
        $productcolors = ProductColor::where('id', $id)->first();

        $productcolors->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

    return redirect()->back()->with($notification);
}
}
