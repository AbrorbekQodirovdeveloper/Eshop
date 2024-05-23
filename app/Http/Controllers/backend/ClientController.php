<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
  public function addClientRating( $product_id ,  Request $request){
        $client = Client::where('email' , $request->email)->first();
        if($client){
            $client->update([
                'fullname' => $request->fullname,
                'email' =>  $request->email,
                'password' => strlen($request->password) > 0  ? $request->password : null,

              ]);
              Review::create([
                            'comment' => $request->comment,
                            'rating' => $request->rating,
                            'product_id' => $product_id,
                            'client_id' => $client->id,
              ]);
        }else{

           $client  =  Client::create([
                'fullname' => $request->fullname,
                'email' =>  $request->email,
                'password' => strlen($request->password) > 0  ? $request->password : null,

              ]);
          Review::create([

                        'comment' => $request->comment,
                        'rating' => $request->rating,
                        'product_id' => $product_id,
                        'client_id' => $client->id,

              ]);
            }


        return redirect()->back();
    }

    public function loginView(){
        return view('frontend.login');
    }

    public function registerClient(Request $request){
         $client = Client::where('email' , $request->email)->first();
         if($client  && strlen( $request->password) == 0 ){
            $client->update([
                'fullname' => $request->fullname,
                'email' =>  $request->email,
                'password' => Hash::make($request->password),

              ]);
              Session::put('client' , $client);
              $notification = array(
                'message' => 'You are loginned  succsesfuly!',
                'alert-type' => 'success'
            );
         return redirect()->route('index')->with($notification);
          }else if(!$client ){
             $client = Client::create([
                'fullname' => $request->fullname,
                'email' =>  $request->email,
                'password' => Hash::make($request->password),

              ]);
              Session::put('client' , $client);
              $notification = array(
                'message' => 'You are loginned  succsesfuly!',
                'alert-type' => 'success'
            );
              return redirect()->route('index')->with($notification);
        }else{
            $notification = array(
            'message' => 'Please login if you have already registered!',
            'alert-type' => 'error'
        );

        return redirect()->route('client.login')->with($notification);

        }

    }

    public function loginClient(Request $request){
        $client = Client::where('email' , $request->email)->first();
        // $password = Hash::make($request->password);
        if($client &&  Hash::check( $request->password ,$client->password  ) ){
            Session::put('client' , $client);
            $notification = array(
                'message' => 'You are loginned  succsesfuly!',
                'alert-type' => 'success'
            );
            return redirect()->route('index')->with($notification);
       }else {
         $notification = array(
            'message' => 'Password or email is incorrect!',
            'alert-type' => 'warning'
        );

        return redirect()->route('client.login')->with($notification);

      }
}
 public function logoutClient(){
    Session::forget('client');
      $notification = array(
        'message' => 'You are log outed!',
        'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);

}

}
