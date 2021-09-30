<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'type',
        'fee',
        'duration',
        'course_details',
        'eligibility',
    ];

    public function CollegeDetail()
    {
        return $this->belongsToMany(CollegeDetail::class)->withPivot('college_detail_id', 'course_id');
    }
}
