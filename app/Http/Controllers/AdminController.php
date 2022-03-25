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
}
