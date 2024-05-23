<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Hotitem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HotItemController extends Controller
{
          public function hotitemView(){
        $hotitems = Hotitem::get();
        return view('backend.hotitem.hotitemview', compact('hotitems'));
    }
public function hotitemAdd(){
        return view('backend.hotitem.hotitemadd');
    }
      public function hotitemStore(Request $request){
              $request->validate(
            [

                'image' => 'required',
                'name' => 'required',
                'about' => 'required',
                'title' => 'required',
                'oldprice' => 'required',
                'price' => 'required',
                'discount' => 'required',

            ],
            [

                'image.required' => 'Upload image ',
                'name.required' => 'Input name',
                'about.required' => 'Input about',
                'title.required' => 'Input title',
                'oldprice.required' => 'Input oldprice',
                'price.required' => 'Input description',
                'discount.required' => 'Input discaunt',

            ]
        );

        $image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/hotitem/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);
        Hotitem::create([

            'image' => $save_url_image,
            'name' => $request->name,
            'about' => $request->about,
            'title' => $request->title,
            'oldprice' => $request->oldprice,
            'price' => $request->price,
            'discount' => $request->discount,
        ]);

        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.hotitem')->with($notification);
    }
         public function hotitemEdit($id){
        $hotitems = Hotitem::where('id', $id)->first();
        return view('backend.hotitem.hotitemedit', compact('hotitems'));
    }
 public function hotitemUpdate(Request $request, $id){
        $request->validate(
            [

                'image' => 'required',
                'name' => 'required',
                'about' => 'required',
                'title' => 'required',
                'oldprice' => 'required',
                'price' => 'required',
                'discount' => 'required',

            ],
            [

                'image.required' => 'Upload image ',
                'name.required' => 'Input name',
                'about.required' => 'Input about',
                'title.required' => 'Input title',
                'oldprice.required' => 'Input oldprice',
                'price.required' => 'Input description',
                'discount.required' => 'Input discaunt',

            ]
        );
        $image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/hotitem/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        $hotitems = Hotitem::where('id', $id)->first();


        $hotitems->update([


            'image' => $save_url_image,
            'name' => $request->name,
            'about' => $request->about,
            'title' => $request->title,
            'oldprice' => $request->oldprice,
            'price' => $request->price,
            'discount' => $request->discount,

        ]);


        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.hotitem')->with($notification);
    }
  public function hotitemDelete($id){
        $hotitems = Hotitem::where('id', $id)->first();

        $hotitems->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
