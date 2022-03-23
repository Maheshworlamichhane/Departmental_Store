<?php

namespace App\Http\Controllers\Backend;

use App\Models\TotalStock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TotalStockController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalstockindex()
    {
        $stocks = TotalStock::all();
        return view('Backend.Admin.Stock.TotalStock.stock', ['stocks'=>$stocks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalstockcreate(Request $request)
    {
        $stock = new TotalStock();
        $stock->name = $request->name;
        $stock->quantity = $request->quantity;
        $stock->price = $request->price;
        $stock->category = $request->category;
        $stock->supplier = $request->supplier;
        $stock->total = $request->total;
        $stock->save();
        return back()->with('status', 'Product Added !!');
    }


    public function totalstockedit($id)
    {
        $stocks = TotalStock::find($id);
        return view('Backend.Admin.Stock.TotalStock.editstock', ['stocks'=>$stocks]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TotalStock  $totalStock
     * @return \Illuminate\Http\Response
     */
    public function totalstockupdate(Request $request, $id)
    {
        $stocks = TotalStock::find($id);
        $stocks->name = $request->name;
        $stocks->quantity = $request->quantity;
        $stocks->price = $request->price;
        $stocks->category = $request->category;
        $stocks->supplier = $request->supplier;
        $stocks->total = $request->total;


        $stocks->save();
        return redirect(route('totalstockindex'))->with('status', 'Product Added !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TotalStock  $totalStock
     * @return \Illuminate\Http\Response
     */
    public function totalstockdestroy($id)
    {
        TotalStock::destroy($id);
        return redirect(route('totalstockindex'))->with('status', 'Product Deleted User');

    }
}
