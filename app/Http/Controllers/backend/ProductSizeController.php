<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
              public function productsizeView(){
            $productsizes = ProductSize::get();
        return view('backend.productsize.productsizeview', compact('productsizes'));
    }
public function productsizeAdd(){
        return view('backend.productsize.productsizeadd');
    }
      public function productsizeStore(Request $request){
              $request->validate(
            [

                'size' => 'required',
            ],
            [
                'size.required' => 'Input size',
            ]
        );


        ProductSize::create([
            'size' => $request->size,
        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.productsize')->with($notification);
    }
         public function productsizeEdit($id){
        $productsizes = ProductSize::where('id', $id)->first();
        return view('backend.productsize.productsizeedit', compact('productsizes'));
    }
 public function productsizeUpdate(Request $request, $id){
        $request->validate(
            [


                'size' => 'required',
            ],
            [


                'size.required' => 'Input size ',
            ]
        );


        $productsizes = ProductSize::where('id', $id)->first();

        $productsizes->update([



            'size' => $request->size,

        ]);

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.productsize')->with($notification);
    }
  public function productsizeDelete($id){
        $productsizes = ProductSize::where('id', $id)->first();

        $productsizes->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

    return redirect()->back()->with($notification);
}
}
