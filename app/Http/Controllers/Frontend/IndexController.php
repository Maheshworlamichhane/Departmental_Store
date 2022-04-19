<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Stock;
use App\Models\User;
use App\Models\Order;
use App\Models\ManageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){

        $forms = DB::table('forms')->select('image','name','description')->orderBy('image','desc')->limit(1)->get();
        // $stocks =Stock::all();
        // $products = DB::table('manage_products')->select('image','name','price','quantity')->orderBy('image','desc')->limit(50)->get();
        $products = DB::table('manage_products')->select('id','image','name','price','quantity')->orderBy('image','desc')->limit(50)->get();

        $roles=Auth::User()->roles;
        if($roles=='Admin'){
            return view('Backend.Admin.adminDashboard');
        }

        else{
            return view('Frontend.index',compact('products','forms'));
        }


    }
    public function login() {
        return view('\auth\login');
    }



    // public function admindashboard() {
    //     $total_orders =DB::table('orders')->count();
    //     $total_orders =DB::table('orders')->count();
    //     $total_products =DB::table('orders')->count();
    //     $total_users =DB::table('users')->count();
    //     $users = User::where ('roles', 'User')->get();
    //     $products = ManageProduct::all();
    //     $orders = Order::all();

    //     return view('Backend.Admin.dashboard', compact('total_orders','orders','users','products','total_users','total_products'));
    // }

    // public function productdetails() {
    //     $products = ManageProduct::all();
    //     return view('Backend.Admin.productdetails', compact('products'));
    // }


}
