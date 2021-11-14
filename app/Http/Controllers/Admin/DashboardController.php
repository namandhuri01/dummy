<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
    public function index(Request $request)
    {
        $totalRegisteredStudentsMonth = User::whereMonth('created_at', Carbon::now()->month)
        ->where('role_id', '=', 4)->count();
        $totalRegisteredCollegesMonth = User::whereMonth('created_at', Carbon::now()->month)
        ->where('role_id', '=', 5)->count();
        $totalRegisteredStudentsYear = User::whereYear('created_at',  Carbon::now()->year)
        ->where('role_id', '=', 4)->count();
        $totalRegisteredCollegesYear = User::whereYear('created_at', Carbon::now()->year)
        ->where('role_id', '=', 5)->count();
        return view('admin.dashboard.index',compact('totalRegisteredStudentsYear','totalRegisteredCollegesYear','totalRegisteredStudentsMonth','totalRegisteredCollegesMonth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("naman");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
