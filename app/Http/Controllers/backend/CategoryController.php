<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
               public function categoryView(){
             $category = Category::get();
        return view('backend.category.categoryview', compact('category'));
    }
public function categoryAdd(){
        return view('backend.category.categoryadd');
    }
      public function categoryStore(Request $request){
  $request->validate(
            [

                'partner_id' => 'required',
                'name' => 'required',

            ],
            [

                'partner_id.required' => 'Input name',
                'name.required' => 'Input about',

            ]
        );



        Category::create([

            'partner_id' => $request->partner_id,
            'name' => $request->name,

        ]);


        $notification = array(
            'message' => 'Added succsesfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }
         public function categoryEdit($id){
        $category = Category::where('id', $id)->first();
        return view('backend.category.categoryedit', compact('category'));
    }
 public function categoryUpdate(Request $request, $id){
        $request->validate(
            [
                   'partner_id' => 'required',
                   'name' => 'required',
            ],
            [
                'partner_id.required' => 'Input partner_id',
                'name.required' => 'Input name',


            ]
        );
        $category = Category::where('id', $id)->first();


        $category->update([
               'partner_id' => $request->partner_id,
               'name' => $request->name,

        ]);


        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }
  public function categoryDelete($id){
        $category = Category::where('id', $id)->first();

        $category->delete();

        $notification = array(
            'message' => 'Add succsesfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
