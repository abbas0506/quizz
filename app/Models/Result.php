<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'sname',
        'quizId',
        'semesterNo',
        'rollNo',
        'marks',
        'total',
    ];

    //public $timestamps = false;

}
