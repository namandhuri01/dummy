<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeDetail extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id','college_type_id', 'contact_person_name','contact_number','alternate_number','fax_number','email','logo','cover_image','card_image','website','affilated_by','year_of_establishment','dte_code',
        'broucher','country_id','state_id','city','about','achivment','iso_detail','address','authorize_body','facilites','added_for','slug',
    ];

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
