<?php

namespace App\Http\Controllers\Admin;

use Hash;
use App\Models\User;
use App\Models\CollegeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CollegeRequest;
use Illuminate\Support\Facades\Password;

class CollegeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','CheckUserRole']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = User::where('role_id', '=',5)->paginate(15);

        return view('admin.college.index',compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.college.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollegeRequest $request)
    {
        $userData = $request->input();
        $settingData = $request->input('college_detail');
    	$userData['role_id'] = config('custom.roles.subadmin');
    	$userData['password'] =  Hash::make('password');
        unset($userData['college_detail']);

        DB::transaction(function () use($userData, $settingData) {
            $user = User::create($userData);
            $user->profile()->create($settingData);

            // inserting record in user reset password table
            $token = $this->broker()->createToken($user);

            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $user->email,
            ], false));
        });
        $user->notify(new SubAdminAccountNotification($url));
        return back()->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = User::find($id);
        $college->delete();
        $notification = array(
            'message' => 'College deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('admin.colleges.index'))->with($notification);
    }
}
