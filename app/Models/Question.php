<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quizId',
        'statement',
        'optionA',
        'optionB',
        'optionC',
        'optionD',
        'ans',
    ];

    public $timestamps = false;

    public function quiz(){
        return $this->belongsTo('App\Models\Quiz','quizId');
    }


}
