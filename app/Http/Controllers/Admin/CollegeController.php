<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Image;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\CollegeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CollegeRequest;
use Illuminate\Support\Facades\Password;
use App\Notifications\CollegeAccountNotification;

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
        $collegeType = \App\Models\CollegeType::all();
        $countries   =  \App\Models\Country::all();
        return view('admin.college.create',compact('collegeType','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollegeRequest $request)
    {
        // dd($request->all());
        $userData             = $request->input();
    	$userData['role_id']  = config('custom.roles.college');
    	$userData['password'] =  Hash::make('password');
        $settingData          = $request->input('college_detail');
        $facilites = explode(',', $request->facilites);
        $settingData['facilites'] = serialize($facilites);
        $settingData['added_for'] = serialize($request->added_for);
        unset($userData['college_detail']);

        $settingData['slug'] = Str::slug($settingData['college_name']);



        DB::transaction(function () use($userData,$settingData, $request) {
            // $user = User::create($userData);
            $user = User::create($userData);

            if($request->file('broucher')) {
            $settingData['broucher']  = $this->broucherImage($request,$user);
            }
            if($request->file('logo')) {
                $settingData['logo'] =  $this->logoImage($request,$user);
            }
            if($request->file('cover_image')) {
                $settingData['cover_image'] = $this->coverImage($request,$user);

            }
            if($request->file('card_image')) {
                $settingData['card_image'] = $this->cardImage($request,$user);
            }



            $user->collegeDetail()->create($settingData);
            // inserting record in user reset password table
            $token = $this->broker()->createToken($user);

            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $user->email,
            ], false));
            $user->notify(new CollegeAccountNotification($url));
        });
        $notification = array(
            'message' => 'Account created successfully.!',
            'alert-type' => 'success'
        );
        return redirect(route('admin.colleges.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::with(['collegeDetail'])->where(['id' => $id])->first();
        return view('admin.college.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::with(['collegeDetail'])->where(['id' => $id])->first();
        $collegeType = \App\Models\CollegeType::all();
        $countries   =  \App\Models\Country::all();
        return view('admin.college.edit',compact('user','collegeType','countries'));
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
         // dd($request->all());
        $settingData   = $request->input('college_detail');
        $facilites = explode(',', $request->facilites);
        $settingData['facilites'] = serialize($facilites);
        $settingData['added_for'] = serialize($request->added_for);
        // unset($userData['college_detail']);

        $settingData['slug'] = Str::slug($settingData['college_name']);
            // $user = User::create($userData);
        $user = User::find($id);

        if($request->file('broucher')) {
            $settingData['broucher']  = $this->broucherImage($request,$user);
        }
        if($request->file('logo')) {
            $settingData['logo'] =  $this->logoImage($request,$user);
        }
        if($request->file('cover_image')) {
            $settingData['cover_image'] = $this->coverImage($request,$user);

        }
        if($request->file('card_image')) {
            $settingData['card_image'] = $this->cardImage($request,$user);
        }



        $user->collegeDetail()->create($settingData);
            // inserting record in user reset password table

        $notification = array(
            'message' => 'Account created successfully.!',
            'alert-type' => 'success'
        );
         return redirect(route('admin.colleges.index'))->with($notification);
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
    public function broker()
    {
        return Password::broker();
    }
    protected function broucherImage($request, $user){

        if($file = $request->file('broucher')) {
            $desinationFolder = 'public/college_image/'.$user->id.'/broucher';

            $path = $request->file('broucher')
                ->storeAs($desinationFolder, $file->getClientOriginalName());
            $imageUpload = Image::make($file);
            $thumbnailPath = storage_path().'/app/'.$desinationFolder.'/thumb_';

            $imageUpload->resize(600,600);
            $imageUpload = $imageUpload->save($thumbnailPath.$file->getClientOriginalName());


            return $file->getClientOriginalName();
        }
    }
    protected function logoImage($request, $user){

        if($file = $request->file('logo')) {
            $desinationFolder = 'public/college_image/'.$user->id.'/logo';

            $path = $request->file('logo')
                ->storeAs($desinationFolder, $file->getClientOriginalName());
            $imageUpload = Image::make($file);
            $thumbnailPath = storage_path().'/app/'.$desinationFolder.'/thumb_';

            $imageUpload->resize(50,50);
            $imageUpload = $imageUpload->save($thumbnailPath.$file->getClientOriginalName());


            return $file->getClientOriginalName();
        }
    }
    protected function coverImage($request, $user){

        if($file = $request->file('cover_image')) {
            $desinationFolder = 'public/college_image/'.$user->id.'/coverImage';

            $path = $request->file('cover_image')
                ->storeAs($desinationFolder, $file->getClientOriginalName());
            $imageUpload = Image::make($file);
            $thumbnailPath = storage_path().'/app/'.$desinationFolder.'/thumb_';

            $imageUpload->resize(1400,200);
            $imageUpload = $imageUpload->save($thumbnailPath.$file->getClientOriginalName());


            return $file->getClientOriginalName();
        }
    }
    protected function cardImage($request, $user){

        if($file = $request->file('card_image')) {
            $desinationFolder = 'public/college_image/'.$user->id.'/cardImage';

            $path = $request->file('card_image')
                ->storeAs($desinationFolder, $file->getClientOriginalName());
            $imageUpload = Image::make($file);
            $thumbnailPath = storage_path().'/app/'.$desinationFolder.'/thumb_';

            $imageUpload->resize(1400,200);
            $imageUpload = $imageUpload->save($thumbnailPath.$file->getClientOriginalName());


            return $file->getClientOriginalName();
        }
    }
}
