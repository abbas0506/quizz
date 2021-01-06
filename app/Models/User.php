<?php

namespace App\Models;

use App\Http\Controllers\TeacherController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'password',
        'type',
    ];

    public function student(){
        return $this->hasOne(Student::class,'userId');
    }
    public function teacher(){
        return $this->hasOne(Teacher::class,'userId');
    }
    
    
}
