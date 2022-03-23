<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Managestaff;
use App\Models\User;

class ManageStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function iindex()
    {

        $staffs = User::where ('roles', 'Staff')->get();
        return view('Backend.Admin.Staff.managestaff', ['staffs'=>$staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ccreate(Request $request)
    {
        $staff = new User;
        $staff->name = $request->name;
		$staff->email = $request->email;
        $staff->roles='Staff';
        $staff->password =bcrypt($request->password);
        $staff->save();
        return back()->with('status', 'Staff Added !!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eedit($id)
    {
        $staff = User::find($id);
        return view('Backend.Admin.Staff.editstaff', ['staff'=>$staff]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uupdate(Request $request, $id)
    {
        $staff = User::find($id);
        $staff->name = $request->name;
		$staff->email = $request->email;
        $staff->password =$request->password;
        $staff->save();
        return redirect(route('iindex'))->with('status', 'Staff Added !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ddestroy($id)
    {
        User::destroy($id);
        return redirect(route('iindex'))->with('status', 'Staff Deleted User');
    }
}
