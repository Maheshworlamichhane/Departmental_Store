<?php

namespace App\Http\Controllers\Backend;

// use App\Http\Controllers\Backend\reponse;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\ManageProduct;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    // public function orderindex()
    // {
    //     $users =User::all();
    //     $categories =Category::all();
    //     $orders = Order::all();
    //     $products = ManageProduct::all();
    //     return view('Backend.User.order', ['orders'=>$orders,'products'=>$products,'users'=>$users,'categories'=>$categories]);
    // }

    public function makeOrder($id) {
        $this->id = $id;
        $pro = ManageProduct::where('id', $this->id)->first();
        $products = ManageProduct::all();
        $orders = Order::all();
        return view('Backend.User.order', compact('pro', 'products', 'orders'));
    }


    public function ordercreate(Request $request)
    {
        $order = new Order;
        $order->user_id =$request->user_id;
        $order->name =$request->name;
        $order->email =$request->email;
        $order->manage_product_id =$request->manage_product_id;
        $order->product_name =$request->product_name;
        $order->product_price =$request->product_price;
        $order->category_name =$request->category_name;
        $order->quantity =$request->quantity;
        $order->total =$request->total;

        $manage_products = ManageProduct::where('id',$order->manage_product_id)->first();
        $manage_products->quantity = $manage_products->quantity - $request->quantity;
        $manage_products->save();
        $order->save();
        return back()->with('status', 'Order Added !!');
    }


    public function orderedit($id)
    {
        $users = User::all();
        $order = Order::find($id);
        $products = ManageProduct::all();
        return view('Backend.User.edit', ['order'=>$order],['products'=>$products],['users'=>$users]);

    }

    public function orderview($id)
    {
        $users = User::all();
        $products = ManageProduct::all();
        $categories = Category::all();
        $orders = Order::where('id',$id)->get();
        return view('Backend.User.view',['orders'=>$orders],['products'=>$products],['users'=>$users],['categories'=>$categories]);
    }

    public function orderupdate(Request $request, $id)
    {
            $order = Order::find($id);
            $order->user_id =$request->user_id;
            $order->name =$request->name;
            $order->email =$request->email;

            $order->manage_product_id =$request->manage_product_id;
            $order->product_name =$request->product_name;
            $order->product_price =$request->product_price;
            $order->category_name =$request->category_name;
            $order->quantity =$request->quantity;
            $order->total =$request->total;
            $order->save();
            return redirect(route('orderindex'))->with('status', 'Order Updated !!');
    }
    public function orderdestroy($id)
    {
        $users = User::all();
        $order= Order::findOrFail($id);
        $manage_products = ManageProduct::where('id',$order->manage_product_id)->first();
        $manage_products->quantity = $manage_products->quantity + $order->quantity;
        $manage_products->save();
        Order::destroy($id);
        return redirect(route('orderindex',compact('manage_products','users')));
    }

    public function get_products($id){

        $product = ManageProduct::where('id',$id)->first();
        $price =$product->price;
        $name =$product->name;
        $product_quantity =$product->quantity;
        $category_name =$product->category_name;
        $response =['status'=>'Success','price'=>$price,'name'=>$name, 'product_quantity'=>$product_quantity,'category_name'=>$category_name];
        echo (json_encode($response));
    }

    public function get_users($id){

        $user = User::where('id',$id)->first();
        $name =$user->name;
        $email =$user->email;
        $show =['status'=>'Success','name'=>$name,'email'=>$email];
        echo (json_encode($show));
    }


    // public function payment(Request $request){

    //     $order = new Order();
    //     $order->name =$request->name;
    //     $order->email =$request->email;
    //     $order->manage_product_id =$request->manage_product_id;
    //     $order->product_name =$request->product_name;
    //     $order->product_price =$request->product_price;
    //     $order->quantity =$request->quantity;
    //     $order->total =$request->total;
    //     $order->category_name =$request->category_name;
    //     $order->save();

    //     if($request->input('payment_mode') =="Paid with PayPal" || $request->input('payment_mode') == "Paid With Paypal")
    //     {
    //         // return response()->json(['status'=>"Order Placed Successfully"]);
    //         return response()->json(['status'=>"Order Placed Successfully"]);

    //     }
    //     return redirect(route("orderindex"))->with('status', "Order Placed Successfully !!");
    // }

}
