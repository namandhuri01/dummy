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
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name'  => 'bail|required|string',
            'remark'=> 'bail|required|string'
        ]);
        $data = $request->input();
        $collegetype = CollegeType::create($data);
        $notification = array(
            'message' => 'Collegetype created Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.college-type.index')->with($notification);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'  => 'bail|required|string',
            'remark'=> 'bail|required|string'
        ]);
        $data = $request->input();
        $collegetype = CollegeType::find($id);
        $collegetype->update($data);
        $notification = array(
            'message' => 'Collegetype updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.college-type.index')->with($notification);
    }
    public function destroy($id)
    {

    }
}
