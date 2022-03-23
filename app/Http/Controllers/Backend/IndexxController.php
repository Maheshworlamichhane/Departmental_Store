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
    public function admindashboard() {
        $total_orders =DB::table('orders')->count();
        $total_orders =DB::table('orders')->count();
        $total_products =DB::table('orders')->count();
        $total_users =DB::table('users')->count();
        $users = User::where ('roles', 'User')->get();
        $products = ManageProduct::all();
        $orders = Order::all();

        return view('Backend.Admin.dashboard', compact('total_orders','orders','users','products','total_users','total_products'));
    }

    public function productdetails() {
        $products = ManageProduct::all();
        $search = $request['search'] ?? "";
        if($search != "") {
            $products = ManageProduct::where('name', 'LIKE', "%$search%")->get();
        }else {
            $products = ManageProduct::orderBy('id', 'Asc')->get();
        }
        return view('Backend.Admin.productdetails', compact('products'));
    }

    public function instockdetails() {
        $stocks = InStock::all();
        $search = $request['search'] ?? "";
        if($search != "") {
            $stocks = InStock::where('name', 'LIKE', "%$search%")->get();
        }else {
            $stocks = InStock::orderBy('id', 'Asc')->get();
        }
        return view('Backend.Admin.instockdetails', compact('stocks'));
    }

    public function paymentdetails() {
        $orders = Payment::all();
        $search = $request['search'] ?? "";
        if($search != "") {
            $orders = Payment::where('name', 'LIKE', "%$search%")->get();
        }else {
            $orders = Payment::orderBy('id', 'Asc')->get();
        }
        return view('Backend.Admin.paymentdetails', compact('orders'));
    }

    public function totalstockdetails() {
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
