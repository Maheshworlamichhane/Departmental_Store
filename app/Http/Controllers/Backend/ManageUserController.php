<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class ManageUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }
    public function Userindex()
    {

        $users = User::where ('roles', 'User')->get();
        return view('Backend.admin.user.manageuser', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usercreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);
        $user = new User;
        $user->name = $request->name;
		$user->email = $request->email;
        $user->roles='User';
        $user->password =bcrypt($request->password);
        $user->save();
        return back()->with('status', 'User Added !!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function useredit($id)
    {
        $user = User::find($id);
        return view('Backend.admin.user.edituser', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userupdate(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->name;
		$user->email = $request->email;
        $user->password =$request->password;
        $user->save();
        return redirect(route('userindex'))->with('status', 'User Added !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userdestroy($id)
    {
        User::destroy($id);
        return redirect(route('userindex'))->with('status', 'User Deleted User');
    }
}
