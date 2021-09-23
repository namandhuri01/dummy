<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
