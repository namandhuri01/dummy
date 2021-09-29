<?php

namespace App\Models;

use Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeDetail extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id','college_name','college_type_id', 'contact_person_name','contact_number','alternate_number','fax_number','email','logo','cover_image','card_image','website','affilated_by','year_of_establishment','dte_code',
        'broucher','country_id','state_id','city','about','achivment','iso_detail','address','authorize_body','facilites','added_for','slug',
    ];
    protected $casts = [
        'added_for' => 'array',
    ];
    protected $appends = ['thumb_logo','banner'];

    public function getThumbLogoAttribute(){
        if($this->logo)
        {
            $thumbPath = 'college_image/'.$this->user_id.'/logo/thumb_'.$this->logo;
            // dd(Storage::disk('public')->exists($thumbPath));
            if(Storage::disk('public')->exists($thumbPath)) {
                return Storage::url($thumbPath);
            }
        }
        return url('images/profile/profile.png');
    }
    public function getBannerAttribute()
    {
        if($this->cover_image)
        {
            $thumbPath = 'college_image/'.$this->user_id.'/coverImage/thumb_'.$this->cover_image;

            if(Storage::disk('public')->exists($thumbPath)) {
                return Storage::url($thumbPath);
            }
        }
        return url('images/banner/VIaL8H.jpg') ;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function collegeType()
    {
        return $this->belongsTo(CollegeType::class);
    }
}
