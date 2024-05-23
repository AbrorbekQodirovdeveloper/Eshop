<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Main;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class MainController extends Controller
{
             public function mainView(){
             $mains = Main::get();
        return view('backend.main.mainview', compact('mains'));
    }
public function mainAdd(){
        return view('backend.main.mainadd');
    }
      public function mainStore(Request $request){
        $site_logo = $request->file('site_logo');
        $site_logo_name = Str::random(20);
        $ext = strtolower($site_logo->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $site_logo_full_name = $site_logo_name . '.' . $ext;
        $upload_path = 'upload/site_logo/logo/';    //Creating Sub directory in Public folder to put logo
        $save_url_site_logo = $upload_path . $site_logo_full_name;
        $success = $site_logo->move($upload_path, $site_logo_full_name);



        Main::create([

           'site_logo' => $save_url_site_logo,
           'site_title' =>  $request->site_title,
           'site_about' =>  $request->site_about,
           'phone' =>  $request->phone,
           'address' =>  $request->address,
           'email' =>  $request->email,

        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.main')->with($notification);
    }
         public function mainEdit($id){
        $mains = Main::where('id', $id)->first();
        return view('backend.main.mainedit', compact('mains'));
    }
 public function mainUpdate(Request $request, $id){
            $mains = Main::find($id);
            $site_logo = $request->file('site_logo');
        if ($site_logo) {
            unlink($mains->site_logo);
            $site_logo_name = Str::random(20);
            $ext = strtolower($site_logo->getClientOriginalExtension()); // You can use also getClientOriginalName()
            $site_logo_full_name = $site_logo_name . '.' . $ext;
            $upload_path = 'upload/site_logo/logo/';    //Creating Sub directory in Public folder to put logo
            $save_url_site_logo = $upload_path . $site_logo_full_name;
            $success = $site_logo->move($upload_path, $site_logo_full_name);
        } else {
            $save_url_site_logo = $mains->site_logo;
        }

        $mains = Main::where('id', $id)->first();


        $mains->update([


           'site_logo' => $save_url_site_logo,
           'site_title' =>  $request->site_title,
           'site_about' =>  $request->site_about,
           'phone' =>  $request->phone,
           'address' =>  $request->address,
           'email' =>  $request->email,

        ]);


        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.main')->with($notification);
    }
  public function mainDelete($id){
        $mains = Main::where('id', $id)->first();

        $mains->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
