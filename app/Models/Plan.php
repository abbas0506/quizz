<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'levelId',
        'semesterNo',
        'subjectId',
    ];

    public $timestamps = false;

    public function level(){
        return $this->belongsTo(Level::class, 'subjectId');
    }
    public function subject(){
        return $this->belongsTo(Subject::class, 'subjectId');
    }


}
