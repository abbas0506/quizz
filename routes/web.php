<?php

use Illuminate\Support\Facades\Route;

//middleware classes
use App\http\Middleware\AdminAccess;
use App\http\Middleware\TeacherAccess;
use App\http\Middleware\StudentAccess;

//controller classes
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AttemptController;
use App\Http\Controllers\PendingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','users.signin');
//user authorization

Route::view('/signin','users.signin');
Route::post('/signin', [UserController::class, 'signin']);
Route::get('/signup', [UserController::class, 'signup']);
Route::post('/signup', [UserController::class, 'store']);
Route::get('/signout',[UserController::class, 'signout']);
Route::view('/signup_success', 'users.signup_success');

// 

Route::view('/admin','admin.signin');
Route::middleware([AdminAccess::class])->group(function(){
      Route::view('/home','admin.index');
      Route::resource('levels', LevelController::class)->except(['create']);
      Route::resource('subjects', SubjectController::class)->except(['create']);
      Route::resource('plans', PlanController::class)->except(['create','edit']);

});

Route::middleware([TeacherAccess::class])->group(function(){
      Route::get('/teachers',[TeacherController::class, 'index']);
      Route::get('/quiz/stat',[QuizController::class, 'stat']);
      Route::resource('quizzes', QuizController::class);
      Route::resource('questions', QuestionController::class);
});


Route::middleware([StudentAccess::class])->group(function(){
      Route::resource('students', StudentController::class)->only('index');
      Route::resource('attempts', AttemptController::class);
      Route::resource('pendings', PendingController::class);

});