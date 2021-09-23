<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','CheckUserRole']);
    }

    public function index()
    {
        return view('college.dashboard.index');
    }
}
