<?php

namespace App\Http\Controllers\College;

use Image;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CollegeDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CollegeRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','CheckUserRole']);
    }
    public function index()
    {
        $user = User::with(['collegeDetail'])->where(['id' => Auth::User()->id])->first();
        $collegeType = \App\Models\CollegeType::all();
        $countries   =  \App\Models\Country::all();
        return view('college.profile.show',compact('user','collegeType','countries'));
    }
    public function show()
    {
        $user = User::with(['collegeDetail'])->where(['id' => Auth::User()->id])->first();
        $collegeType = \App\Models\CollegeType::all();
        $countries   =  \App\Models\Country::all();
        return view('college.profile.show',compact('user','collegeType','countries'));
    }

    public function update(CollegeRequest $request, $id)
    {
        $settingData   = $request->input('college_detail');
        $facilites = explode(',', $request->facilites);
        $settingData['facilites'] = serialize($facilites);
        $settingData['added_for'] = serialize($request->added_for);

        $settingData['slug'] = Str::slug($settingData['college_name']);
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

        $user->collegeDetail()->updateOrCreate(['user_id' => $id],$settingData);
        $notification = array(
            'message' => 'Data updated successfully.!',
            'alert-type' => 'success'
        );
        return redirect(route('college.profile.index'))->with($notification);
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
