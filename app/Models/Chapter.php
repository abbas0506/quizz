<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'name',
        'subject_id',
    ];
    public $timestamps = false;

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function questions(){
        return $this->hasMany(Question::class,'chapter_id');
    }
    public function short(){
        return $this->hasMany(Question::class,'chapter_id')->where('type',1);
    }
    public function long(){
        return $this->hasMany(Question::class,'chapter_id')->where('type',2);
    }
    public function mcqs(){
        return $this->hasMany(Question::class,'chapter_id')->where('type',3);
    }

    
}
