<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OfferController extends Controller
{
          public function offerView(){
        $offers = Offer::get();
        return view('backend.offer.offerview', compact('offers'));
    }
public function offerAdd(){
        return view('backend.offer.offeradd');
    }
      public function offerStore(Request $request){
        $bg_image = $request->file('bg_image');
        $bg_image_name = Str::random(20);
        $ext = strtolower($bg_image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $bg_image_full_name = $bg_image_name . '.' . $ext;
        $upload_path = 'upload/offer/bg_image/';    //Creating Sub directory in Public folder to put logo
        $save_url_bg_image = $upload_path . $bg_image_full_name;
        $success = $bg_image->move($upload_path, $bg_image_full_name);

        $image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/offer/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);


        Offer::create([
            'bg_image' => $save_url_bg_image,
            'image' => $save_url_image,
            'bg_name' => $request->bg_name,
            'bg_title' => $request->bg_title,
            'bg_about' => $request->bg_about,
            'title' => $request->title,
            'about' => $request->about,
        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.offer')->with($notification);
    }
         public function offerEdit($id){
        $offers = Offer::where('id', $id)->first();
        return view('backend.offer.offeredit', compact('offers'));
    }
 public function offerUpdate(Request $request, $id){
  $bg_image = $request->file('bg_image');
        $bg_image_name = Str::random(20);
        $ext = strtolower($bg_image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $bg_image_full_name = $bg_image_name . '.' . $ext;
        $upload_path = 'upload/offer/bg_image/';    //Creating Sub directory in Public folder to put logo
        $save_url_bg_image = $upload_path . $bg_image_full_name;
        $success = $bg_image->move($upload_path, $bg_image_full_name);
 //
$image = $request->file('image');
        $image_name = Str::random(20);
        $ext = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/offer/image/';    //Creating Sub directory in Public folder to put logo
        $save_url_image = $upload_path . $image_full_name;
        $success = $image->move($upload_path, $image_full_name);


        
        $offers = Offer::where('id', $id)->first();


        $offers->update([

            'bg_image' => $save_url_bg_image,
            'bg_name' => $request->bg_name,
            'bg_title' => $request->bg_title,
            'bg_about' => $request->bg_about,
            'image' => $save_url_image,
            'title' => $request->title,
            'about' => $request->about,

        ]);


        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.offer')->with($notification);
    }
  public function offerDelete($id){
        $offers = Offer::where('id', $id)->first();

        $offers->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
