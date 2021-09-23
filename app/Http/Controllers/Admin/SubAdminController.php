<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubAdminRequest;

class SubAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','CheckUserRole']);
    }

    public function index()
    {
        $subadmins = User::where(['role_id' => 2, 'role_id' => 3])->paginate(15);
        return view('admin.sub-admin.index',compact('subadmins'));
    }

    public function create()
    {
        return view('admin.sub-admin.create');
    }
    public function store(SubAdminRequest $request)
    {
        $subadmin = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   => $request->role_id,
        ]);
        $notification = array(
            'message' => 'Sub Admin Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('admin.sub-admins.index'))->with($notification);
    }
    public function destroy($id)
    {
        $subAdmin = User::find($id);
        $subAdmin->delete();
        $notification = array(
            'message' => 'Sub Admin deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('admin.sub-admins.index'))->with($notification);
    }
}
