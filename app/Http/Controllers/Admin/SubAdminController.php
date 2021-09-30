<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubAdminRequest;
use App\Notifications\CollegeAccountNotification;

class SubAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','CheckUserRole']);
    }

    public function index()
    {
        $subadmins = User::whereIn('role_id',[2,3])->withTrashed()->sortable(['deleted_at' => 'IS Null'])->get();
        return view('admin.sub-admin.index',compact('subadmins'));
    }

    public function create()
    {
        return view('admin.sub-admin.create');
    }
    public function store(SubAdminRequest $request)
    {
        $userData = $request->input();
    	$userData['password'] =  Hash::make('password');

        DB::transaction(function () use($userData, $settingData) {
            $user = User::create($userData);
            $user->collegeDetail()->create($settingData);

            // inserting record in user reset password table
            $token = $this->broker()->createToken($user);

            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $user->email,
            ], false));
        });
        $user->notify(new CollegeAccountNotification($url));
        $notification = array(
            'message' => 'Account created successfully.!',
            'alert-type' => 'success'
        );
        return redirect(route('admin.sub-admins.index'))->with($notification);
    }
    public function destroy($id)
    {
        $user = User::withTrashed()->find($id);
        $message='deactivated';
        if($user->trashed()) {
            $user->restore();
            $message="activated";
        } else{
            $user->delete();
        }
        $notification = array(
            'message' => 'Sub Admin deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('admin.sub-admins.index'))->with($notification);
    }
}
