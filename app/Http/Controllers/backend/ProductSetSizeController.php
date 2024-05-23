<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProductSetSize;
use Illuminate\Http\Request;

class ProductSetSizeController extends Controller
{
    public function productsetsizeView(){
            $productsetsizes = ProductSetSize::get();
        return view('backend.productsetsize.view', compact('productsetsizes'));
    }
public function productsetsizeAdd(){
        return view('backend.productsetsize.add');
    }
      public function productsetsizeStore(Request $request){
              $request->validate(
            [

                'size_id' => 'required',
                'product_id' => 'required',
            ],
            [
                'size_id.required' => 'Input size_id',
                'product_id.required' => 'Input product_id',
            ]
        );


        ProductSetSize::create([
            'size_id' => $request->size_id,
            'product_id' => $request->product_id,
        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.productsetsize')->with($notification);
    }
         public function productsetsizeEdit($id){
        $productsetsizes = ProductSetSize::where('id', $id)->first();
        return view('backend.productsetsize.edit', compact('productsetsizes'));
    }
 public function productsetsizeUpdate(Request $request, $id){
        $request->validate(
            [


                'size_id' => 'required',
                'product_id' => 'required',
            ],
            [


                'size_id.required' => 'Input color id',
                'product_id.required' => 'Input product id',
            ]
        );


        $productsetsizes = ProductSetSize::where('id', $id)->first();

        $productsetsizes->update([



            'size_id' => $request->size_id,
            'product_id' => $request->product_id,

        ]);

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.productsetsize')->with($notification);
    }
  public function productsetsizeDelete($id){
        $productsetsizes = ProductSetSize::where('id', $id)->first();

        $productsetsizes->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

    return redirect()->back()->with($notification);
}
}
