<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [QuizController::class,'index']);
Route::get('/quiz/{id}', [QuizController::class,'show']);

Route::get('/take/quiz/{id}',[QuizController::class,'take_quiz']);
Route::post('/finish/quiz',[QuizController::class,'finish_quiz']);

Route::get('/edit/question/{id}', [QuizController::class,'edit_question']);
Route::post('/edit/question', [QuizController::class,'edit_question_post']);
Route::post('/new/question', [QuizController::class,'new_question']);
Route::post('/delete/question', [QuizController::class,'delete_question']);

Route::get('/edit/quiz/{id}', [QuizController::class,'edit_quiz']);
Route::post('/edit/quiz', [QuizController::class,'edit_quiz_post']);
Route::post('/new/quiz', [QuizController::class,'new_quiz']);
Route::post('/delete/quiz', [QuizController::class,'delete_quiz']);