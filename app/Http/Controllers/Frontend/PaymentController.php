<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function order_payment(Request $request){
        $payment = new Payment;
        $payment->user_id =Auth::id();
        $payment->name =$request->name;
        $payment->email =$request->email;
        $payment->manage_product_id =$request->manage_product_id;
        $payment->product_name =$request->product_name;
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
}
