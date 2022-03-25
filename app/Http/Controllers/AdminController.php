<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class AdminController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }

    public function uploadproduct(Request $request)
    {
        $data=new product;

        $image=$request->file; # get file from the name input in form

        $imagename=time().'.'.$image->getClientOriginalExtension(); # stores image uniquely using this format

        $request->file->move('productimage',$imagename);

        $data->image=$imagename;


        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->des;

        $data->quantity=$request->quantity;

        $data->save();

        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function showproduct()
    {
        $data = product::all(); // store all the values from the product table to the data variable

        return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id)
    {
        $data = product::find($id);

        $data->delete();

        return redirect()->back()->with('message','Product Deleted');

    }

    public function updateview($id)
    {
        $data = product::find($id);

        return view('admin.updateview',compact('data'));
    }

    public function updateproduct(Request $request,$id)
    {
        $data = product::find($id); // getting specific product id 

        $image=$request->file; # get file from the name input in form "requesting the file and store it in the image variable"

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension(); # stores image uniquely using this format "renaming the image using the time() function

            $request->file->move('productimage',$imagename); // saving the image in the public folder named productimage

            $data->image=$imagename; // saving the image in the db
        }


        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->des;

        $data->quantity=$request->quantity;

        $data->save(); // save all data in the table

        return redirect()->back()->with('message','Product Updated Successfully');
    }
}
