<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\InStock;
use App\Models\User;
use App\Models\Order;
use App\Models\ManageProduct;
use App\Models\Payment;
use App\Models\TotalStock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class IndexxController extends Controller
{
    public function admindashboard(Request $request) {
        $total_orders =DB::table('orders')->count();
        $total_orders =DB::table('orders')->count();
        $total_products =DB::table('orders')->count();
        $total_users =DB::table('users')->count();
        $users = User::where ('roles', 'User')->get();
        $products = ManageProduct::all();
        $orders = Order::all();
        $d_search = $request['orderSearch'] ?? "";
        if($d_search != "") {
            $orderSearch = Order::where('created_at', 'LIKE', "%$d_search%")->get();
        }else {
            $orderSearch = Order::orderBy('id', 'Asc')->get();
        }

        return view('Backend.Admin.dashboard', compact('total_orders','orders','users','products','total_users','total_products','orderSearch'));
    }

    public function productdetails(Request $request) {
        $products = ManageProduct::all();
        $p_search = $request['productSearch'] ?? "";
        if($p_search != "") {
            $products = ManageProduct::where('name', 'LIKE', "%$p_search%")->paginate(1);
        }else {
            $products = ManageProduct::orderBy('id', 'Asc')->paginate(5);
        }
        return view('Backend.Admin.productdetails', compact('products'));
    }

    public function instockdetails(Request $request) {
        $stocks = InStock::all();
        $search = $request['search'] ?? "";
        if($search != "") {
            $stocks = InStock::where('name', 'LIKE', "%$search%")->get();
        }else {
            $stocks = InStock::orderBy('id', 'Asc')->get();
        }
        return view('Backend.Admin.instockdetails', compact('stocks'));
    }

    public function paymentdetails(Request $request) {
        $orders = Payment::all();
        $search = $request['paymentSearch'] ?? "";
        if($search != "") {
            $paymentSearch = Payment::where('name', 'LIKE', "%$search%")->get();
        }else {
            $paymentSearch = Payment::orderBy('id', 'Asc')->get();
        }
        return view('Backend.Admin.paymentdetails', compact('orders', 'paymentSearch'));
    }

    public function totalstockdetails(Request $request) {
        $stocks = TotalStock::all();
        $search = $request['search'] ?? "";
        if($search != "") {
            $stocks = TotalStock::where('name', 'LIKE', "%$search%")->get();
        }else {
            $stocks = TotalStock::orderBy('id', 'Asc')->get();
        }
        return view('Backend.Admin.totalstockdetails', compact('stocks'));
    }

}
