<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','CheckUserRole']);
    }

    public function index()
    {
        return view('admin.change-password');
    }



    public function store(Request $request){

        $request->validate([
            'current_password' => ['required',new MatchOldPassword],
            'new_password'=>['required'],
            'new_confirmation_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success','Password changed successfully.');
    }
}
