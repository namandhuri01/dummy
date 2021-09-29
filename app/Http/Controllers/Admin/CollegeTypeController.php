<?php

namespace App\Http\Controllers\Admin;

use App\Models\CollegeType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollegeTypeController extends Controller
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
        $collegeTypes = CollegeType::paginate(15);
        return view('admin.college-type.index',compact('collegeTypes'));
    }

}
