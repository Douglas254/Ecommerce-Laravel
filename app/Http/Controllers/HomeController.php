<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }

        else
        {
            $data = product::paginate(3); # all the product table values will be stored in the data variable

            $user=auth()->user(); // getting the user currently logged in

            $count=cart::where('phone',$user->phone)->count(); //getting user phone number from the user table and comparing it with the cart table phone number column and returning in the count how many in the phone number is in the cart


            return view('user.home', compact('data','count'));
        }

    }

    public function index()
    {

        if(Auth::id())
        {
            return redirect('redirect');
        }

        else
        {
            $data = product::paginate(3); # all the product table values will be stored in the data variable
            return view('user.home', compact('data'));
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if($search=='')
        {
            $data = product::paginate(3); # all the product table values will be stored in the data variable
            return view('user.home', compact('data'));
        }

        $data = product::where('title','Like','%'.$search.'%')->get();

        return view('user.home',compact('data'));
    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=auth()->user();

            $product=product::find($id);

            $cart=new cart;

            $cart->name=$user->name;

            $cart->phone=$user->phone;

            $cart->address=$user->address;
            
            $cart->name=$user->name;
            
            $cart->product_title=$product->title;

            $cart->price=$product->price;

            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back()->with('message','Product Added Successfull');
        }
        else
        {
            return redirect('login');
        }
    }

    public function showcart()
    {
        $user=auth()->user(); // getting the user currently logged in

        $cart=cart::where('phone',$user->phone)->get(); // getting which product the specific user added to the cart and sending that specific product to our user.showcart view

        $count=cart::where('phone',$user->phone)->count(); //getting user phone number from the user table and comparing it with the cart table phone number column and returning in the count how many in the phone number is in the cart

        return view('user.showcart',compact('count','cart'));
    }

    public function deletecart($id)
    {
        $data=cart::find($id); // searching for the specific id in the cart table

        $data->delete(); // deleting the id 

        return redirect()->back()->with('message','Product Removed Successfully'); // stay on the same page 
    }

    public function confirmorder(Request $request)
    {
        $user=auth()->user();

        $name=$user->name;

        $phone=$user->phone;

        $address=$user->address;

        foreach($request->productname as $key=>$productname)
        {
            $order=new order;

            $order->product_name=$request->productname[$key];

            $order->quantity=$request->quantity[$key];

            $order->price=$request->price[$key];

            $order->name=$name;

            $order->phone=$phone;
            
            $order->address=$address;

            $order->status='not delivered';

            $order->save();
            

        }

        DB::table('carts')->where('phone',$phone)->delete();

        return redirect()->back()->with('message','Product Ordered Successfully'); // stay on the same page;
    }
}
