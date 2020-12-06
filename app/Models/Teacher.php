<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
    ];

    public $timestamps = false;

    public function quizzes(){
        return $this->hasMany('App\Models\Quiz','teacherId');
    }

}
