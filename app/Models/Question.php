<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'type',
        'rating',
        'status',
        'subject_id',
        'teacher_id',
    ];

    public $timestamps = false;

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }


}
