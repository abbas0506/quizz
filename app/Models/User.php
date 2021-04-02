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
        'loginid',
        'password',
        'usertype',
    ];

    public function student(){
        return $this->hasOne(Student::class,'user_id');
    }
    public function profile(){
        return $this->hasOne(Teacher::class,'user_id');
    }
    
    
}
