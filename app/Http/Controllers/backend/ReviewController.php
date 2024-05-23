<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviewView(){
         $reviews = Review::get();
        return view('backend.review.reviewview', compact('reviews'));
    }
public function reviewAdd(){
        return view('backend.review.reviewadd');
    }
      public function reviewStore(Request $request){
              $request->validate(
            [

                'product_id' => 'required',
                'client_id' => 'required',
                'rating' => 'required',
                'comment' => 'required',
            ],
            [
                'product_id.required' => 'Input product id',
                'client_id.required' => 'Input client id',
                'rating.required' => 'Input rating',
                'comment.required' => 'Input comment',
            ]
        );


        Review::create([
            'product_id' => $request->product_id,
            'client_id' => $request->client_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.review')->with($notification);
    }
         public function reviewEdit($id){
        $reviews = Review::where('id', $id)->first();
        return view('backend.review.reviewedit', compact('reviews'));
    }
 public function reviewUpdate(Request $request, $id){
        $request->validate(
            [


                'product_id' => 'required',
                'client_id' => 'required',
                'rating' => 'required',
                'comment' => 'required',

            ],
            [


                'product_id.required' => 'Input product id',
                'client_id.required' => 'Input client id',
                'rating.required' => 'Input rating',
                'comment.required' => 'Input comment',
            ]
        );


        $reviews = Review::where('id', $id)->first();

        $reviews->update([


            'product_id' => $request->product_id,
            'client_id' => $request->client_id,
            'rating' => $request->rating,
            'comment' => $request->comment,


        ]);

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.review')->with($notification);
    }
  public function reviewDelete($id){
        $reviews = Review::where('id', $id)->first();

        $reviews->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

    return redirect()->back()->with($notification);
}
}
