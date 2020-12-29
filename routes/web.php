<?php

use App\Models\Level;
use App\Models\Question;
use Illuminate\Http\Request;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/students',[App\Http\Controllers\StudentController::class, 'store']);

Route::post('/auth',[App\Http\Controllers\AuthController::class, 'signin']);
Route::post('/signup',[App\Http\Controllers\AuthController::class, 'signup']);
//Route::get('/users',[App\Http\Controllers\UserController::class, 'index']);



//route student's request 
Route::view('/students/getInfo','students.getInfo');
Route::get("/tests", [App\Http\Controllers\TestController::class, 'index']);
Route::get('/tests/{id}', [App\Http\Controllers\TestController::class, 'show']);
Route::post('/tests', [App\Http\Controllers\TestController::class, 'store']);
Route::post('/results',[App\Http\Controllers\ResultController::class, 'store']);
Route::get('/results/{id}', [App\Http\Controllers\ResultController::class, 'show']);


// Route teacher's requests
Route::view('/quizzes/create','quizzes.create');
Route::post("/quizzes/storeFilter", [App\Http\Controllers\QuizController::class, 'storeFilter']);

Route::get("/quizzes", [App\Http\Controllers\QuizController::class, 'index']);
Route::get('/quizzes/create', [App\Http\Controllers\QuizController::class, 'create']);
Route::get('/quizzes/{levelId}', [App\Http\Controllers\QuizController::class, 'expandLevel']);
Route::get('/quizzes/{levelId}/{subjectId}', [App\Http\Controllers\QuizController::class, 'expandSubject']);

Route::get('/quizdetail/{quizId}', [App\Http\Controllers\QuizController::class, 'showQuizDetail']);

Route::post("/quizzes", [App\Http\Controllers\QuizController::class, 'store']);
Route::delete("/quizzes/{id}", [App\Http\Controllers\QuizController::class, 'destroy']);


Route::get("/questions/{id}", [App\Http\Controllers\QuestionController::class, 'edit']);
Route::post("/questions", [App\Http\Controllers\QuestionController::class, 'store']);
Route::post("/questions/{id}", [App\Http\Controllers\QuestionController::class, 'update']);
Route::delete("/questions/{id}", [App\Http\Controllers\QuestionController::class, 'destroy']);