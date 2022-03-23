<?php

namespace App\Http\Controllers\Backend;
use App\Models\InStock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InStockController extends Controller
{
   public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function instockindex()
    {
        $stocks = InStock::all();
        return view('Backend.Admin.Stock.InStocks.stock', ['stocks'=>$stocks]);
    }
    public function instockcreate(Request $request)
    {
        $stock = new InStock;
        $stock->name = $request->name;
        $stock->quantity = $request->quantity;
        $stock->supplier = $request->supplier;
        $stock->save();
        return redirect(route('instockindex'));
    }
    public function instockedit($id)
    {
        $stock = InStock::find($id);
        return view('Backend.Admin.Stock.InStocks.editstock', ['stock'=>$stock]);
    }

    public function instockupdate(Request $request, $id)
    {
        $stock = InStock::find($id);
        $stock->name = $request->name;
        $stock->quantity = $request->quantity;
        $stock->supplier = $request->supplier;

        $stock->save();
        return redirect(route('instockindex'))->with('status', 'Updated  !!');
    }
    public function instockdestroy($id)
    {
        InStock::destroy($id);
        return redirect(route('instockindex'))->with('status', 'Stock Deleted ');
    }
}
