<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\OurBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OurBlogController extends Controller
{
         public function ourblogView(){
        $ourblogs = OurBlog::get();
        return view('backend.ourblog.ourblogview', compact('ourblogs'));
    }
public function ourblogAdd(){
        return view('backend.ourblog.ourblogadd');
    }
      public function ourblogStore(Request $request){
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
        $upload_path = 'upload/ourblog/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        OurBlog::create([


            'image' => $save_url_image,
            'name' => $request->name,
            'title' => $request->title,

        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.ourblog')->with($notification);
    }
         public function ourblogEdit($id){
        $ourblogs = OurBlog::where('id', $id)->first();
        return view('backend.ourblog.ourblogedit', compact('ourblogs'));
    }
 public function ourblogUpdate(Request $request, $id){
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
        $upload_path = 'upload/ourblog/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);

        $ourblogs = OurBlog::where('id', $id)->first();

        $ourblogs->update([


            'image' => $save_url_image,
            'name' => $request->name,
            'title' => $request->title,
        ]);

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.ourblog')->with($notification);
    }
  public function ourblogDelete($id){
        $ourblogs = OurBlog::where('id', $id)->first();

        $ourblogs->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
