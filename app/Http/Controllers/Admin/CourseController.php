<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
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
        $courses = Course::all();
        return view('admin.course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(gettype((int)$request->fee));
        $request->validate([
            'name'              => 'bail|required|string',
            'type'              => 'bail|required|string',
            'duration'          => 'bail|required|string',
            'course_details'    => 'bail|required|string',
            'eligibility'       => 'bail|required|string',
            'fee'               => 'bail|required',
        ]);
        $course = Course::create([
            'name'              => $request->name,
            'type'              => $request->type,
            'fee'               => (int)$request->fee,
            'duration'          => $request->duration,
            'course_details'    => $request->course_details,
            'eligibility'       => $request->eligibility,
        ]);
        $notification = array(
            'message' => 'Course Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.courses.index')->with($notification);
    }

    public function edit(Course $course)
    {
        // $course = Course::find($id);
        return view('admin.course.edit',compact('course'));
    }
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name'              => 'bail|required|string',
            'type'              => 'bail|required|string',
            'duration'          => 'bail|required|string',
            'course_details'    => 'bail|required|string',
            'eligibility'       => 'bail|required|string',
            'fee'               => 'bail|required',
        ]);

        $course->update($request->all());

        $notification = array(
            'message' => 'Category Updatd Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
