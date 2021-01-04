<?php

use Illuminate\Support\Facades\Route;

use App\http\Middleware\AdminAccess;
use App\http\Middleware\TeacherAccess;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\QuizController;


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

Route::view('/','welcome');
Route::get('/usertype', [App\Http\Controllers\UserController::class, 'usertype']); 

//authorization
Route::view('/signin','auth.signin');
Route::view('/teachers/signup','teachers.signup');



Route::get('/students/signup',[App\Http\Controllers\StudentController::class, 'signup']);
Route::get('/students',[App\Http\Controllers\StudentController::class, 'index']);
Route::post('/students',[App\Http\Controllers\StudentController::class, 'store']);
Route::view('/students/signupSuccess','students.signupSuccess');
Route::view('/students/signupFailure','students.signupFailure');

Route::post('/auth',[App\Http\Controllers\AuthController::class, 'signin']);

//Route::get('/users',[App\Http\Controllers\UserController::class, 'index']);



//route student's request 
Route::get('/tests/subjects',[App\Http\Controllers\TestController::class, 'subjects']);
Route::get("/tests", [App\Http\Controllers\TestController::class, 'index']);
Route::get('/tests/{id}', [App\Http\Controllers\TestController::class, 'show']);
Route::post('/tests', [App\Http\Controllers\TestController::class, 'store']);

Route::post('/results',[App\Http\Controllers\ResultController::class, 'store']);
Route::get('/results/{id}', [App\Http\Controllers\ResultController::class, 'show']);

Route::get("/questions/{id}", [App\Http\Controllers\QuestionController::class, 'edit']);
Route::post("/questions", [App\Http\Controllers\QuestionController::class, 'store']);
Route::post("/questions/{id}", [App\Http\Controllers\QuestionController::class, 'update']);
Route::delete("/questions/{id}", [App\Http\Controllers\QuestionController::class, 'destroy']);


Route::resource('attempted', AttemptedController::class);
Route::resource('unattempted', UnattemptedController::class);



Route::view('/admin','admin.signin');
Route::middleware([AdminAccess::class])->group(function(){
      Route::view('/home','admin.index');
      Route::resource('levels', LevelController::class)->except(['create']);
      Route::resource('subjects', SubjectController::class)->except(['create']);
      Route::resource('plans', PlanController::class)->except(['create','edit']);

});


Route::middleware([TeacherAccess::class])->group(function(){
      Route::get('/teachers',[TeacherController::class, 'index']);
      Route::resource('quizzes', QuizController::class);
});