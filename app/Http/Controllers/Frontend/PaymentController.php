<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Order;
use App\Models\ManageProduct;

class PaymentController extends Controller
{
    public function order_payment(Request $request){
        $payment = new Payment;
        $payment->user_id =Auth::id();
        $payment->name =$request->name;
        $payment->email =$request->email;
        $payment->manage_product_id =$request->manage_product_id;
        $payment->product_name =$request->product_name;
        $payment->category_name =$request->category_name;
        $payment->product_price =$request->product_price;
        $payment->quantity =$request->quantity;
        $payment->total =$request->total;
        $payment->payment_mode = $request->payment_mode;
        $payment->payment_id = $request->payment_id;
        $payment->save();

        // dd($total);




        if($request->payment_mode == "Paid With Paypal")
        {
        }

        return response()->json(['status'=>"Order Placed Successfully"]);
    }
    public function cashondelivery(Order $order){


        // $payment = new Payment();
        // $payment->user_id =Auth::id();
        // $payment->name =$order->name;
        // $payment->email =$order->email;
        // $payment->address=$order->address;
        // $payment->manage_product_id =$order->manage_product_id;
        // $payment->product_name =$order->product_name;
        // $payment->product_price =$order->product_price;
        // $payment->quantity =$order->quantity;
        // $product = ManageProduct::findOrFail( $order->manage_product_id );
        // $payment->total =$order->total;
        // $payment->payment_mode = $order->payment_mode;
        // $payment->payment_id = $order->payment_id;
        // $payment->payment_mode = "Cash on Delivery";
        // $payment->save();
        // return redirect('homepage');
    }
}
