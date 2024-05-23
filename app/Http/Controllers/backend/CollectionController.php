<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
          public function collectionView(){
        $collections = Collection::get();
        return view('backend.collection.collectionview', compact('collections'));
    }
public function collectionAdd(){
        return view('backend.collection.collectionadd');
    }
      public function collectionStore(Request $request){
              $request->validate(
            [

                'image' => 'required',
                'name' => 'required',
                'title' => 'required',


            ],
            [
                'image.required' => 'Upload image ',
                'name.required' => 'Input name',
                'title.required' => 'Input title',


            ]
        );

        $image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/collection/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        Collection::create([


            'image' => $save_url_image,
            'name' => $request->name,
            'title' => $request->title,

        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.collection')->with($notification);
    }
         public function collectionEdit($id){
        $collections = Collection::where('id', $id)->first();
        return view('backend.collection.collectionedit', compact('collections'));
    }
 public function collectionUpdate(Request $request, $id){
        $request->validate(
            [

                'image' => 'required',
                'name' => 'required',
                'title' => 'required',


            ],
            [

                'image.required' => 'Upload image ',
                'name.required' => 'Input name',
                'title.required' => 'Input title',


            ]
        );
        $image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/collection/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        $collections = Collection::where('id', $id)->first();

        $collections->update([


            'image' => $save_url_image,
            'name' => $request->name,
            'title' => $request->title,
        ]);

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.collection')->with($notification);
    }
  public function collectionDelete($id){
        $collections = Collection::where('id', $id)->first();

        $collections->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
