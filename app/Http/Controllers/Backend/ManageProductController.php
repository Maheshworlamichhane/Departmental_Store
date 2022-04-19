<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ManageProduct;
use App\Models\Category;
use App\Models\InStock;
use Illuminate\Http\Request;

class ManageProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function productindex()
    {
        $products = ManageProduct::all();
        $category = Category::all();
        $stocks = InStock::all();
        return view('Backend.Admin.Product.manageproduct',compact('products','category','stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productcreate(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'category_name' => 'required',
            'in_stock_id' => 'required',
            'name' => 'required',
            'stock_quantity' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'total' => 'required',
            'image' => 'image|nullable'


        ]);

        $product = new ManageProduct();
        $product->name = $request->name;
		$product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->category_name = $request->category_name;
        $product->in_stock_id = $request->in_stock_id;
        $product->total = $request->total;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->save();
        $Instock = InStock::where('id',$product->in_stock_id)->first();
        $Instock->quantity = $Instock->quantity - $request->quantity;
        $Instock->save();
        return redirect(route('productindex'));
        // return back()->with('status', 'Product Added !!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productedit($id)
    {


        $category = Category::all();
        $stocks = InStock::all();
        $product = ManageProduct::find($id);
        return view('Backend.Admin.Product.editproduct', compact('product','category','stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productupdate(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'category_name' => 'required',
            'in_stock_id' => 'required',
            'name' => 'required',
            'stock_quantity' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'total' => 'required',
            'image' => 'image|nullable'


        ]);
        $product = ManageProduct::find($id);
        $product->name = $request->name;
		$product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        $product->category_name = $request->category_name;
		$product->in_stock_id = $request->in_stock_id;
		$product->total = $request->total;
        if($request->hasfile('image'))
        {
            // $destination = 'uploads/products/'.$product->image;
            // if(File::exists($destination))
            // {
            //     file::delete($destination);
            // }
            // $file = $request->file('image');
            // $extention = $file->getClientOriginalExtension();
            // $filename = time().'.'.$extention;
            // $file->move('uploads/products/', $filename);
            // $product->image = $filename;
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect(route('productindex'))->with('status', 'Product Added !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productdestroy($id)
    {
        ManageProduct::destroy($id);
        return redirect(route('productindex'))->with('status', 'Product Deleted User');

    }
    public function get_stocks($id)
    {
        $Instock = InStock::where('id',$id)->first();
        $name =$Instock->name;
        $stock_quantity =$Instock->quantity;
        $res =['status'=>'Success','name'=>$name,'stock_quantity'=>$stock_quantity];
        echo (json_encode($res));
    }

    public function get_category($id){

        $category = Category::where('id',$id)->first();
        $category_name =$category->name;
        $resp =['status'=>'Success','category_name'=>$category_name];
        echo (json_encode($resp));
    }

}


