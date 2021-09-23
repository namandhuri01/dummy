<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegeType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'remark',
    ];
    public function CollegeDetail()
    {
        return $this->HasOne(CollegeDetail::class);
    }
}
