<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'numOfSemesters',
    ];

    public $timestamps = false;

    public function plans($semesterNo){
        return $this->hasMany(Plan::class,'levelId')
                ->where('semesterNo',$semesterNo)
                ->get();
                
    }
}
