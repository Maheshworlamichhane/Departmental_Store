<?php

namespace App\Http\Controllers\Backend;
use App\Models\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller

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
    public function formindex()

    {
        $forms = Form::all();
        return view('Backend.Admin.About.form', ['forms'=>$forms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formcreate(Request $request)
    {
        $forms = new Form();
        $forms->name = $request->name;
		$forms->description = $request->description;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $forms->image = $filename;
        }
        $forms->save();
        return back()->with('status', 'Product Added !!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formedit($id)
    {
        $forms = Form::find($id);
        return view('Backend.Admin.About.editform', ['forms'=>$forms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formupdate(Request $request, $id)
    {
        $forms = Form::find($id);
        $forms->name = $request->name;
		$forms->description = $request->description;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/', $filename);
            $forms->image = $filename;
        }
        $forms->save();
        return redirect(route('formindex'))->with('status', 'Product Added !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formdestroy($id)
    {
        Form::destroy($id);
        return redirect(route('formindex'))->with('status', 'Product Deleted User');

    }
}
