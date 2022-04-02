<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('question-pack', '\App\Http\Controllers\Api\QuestionsPackController', ['only' => ['index', 'show', 'update', 'store', 'destroy']]);
Route::resource('question', '\App\Http\Controllers\Api\QuestionsController', ['only' => ['index', 'show', 'update', 'store', 'destroy']]);
Route::resource('answers', '\App\Http\Controllers\Api\AnswersController', ['only' => ['index', 'show', 'update', 'store', 'destroy']]);
Route::get('questions-list/{id}',['\App\Http\Controllers\Api\QuestionsController','getQuestionsByQuestionPackId']);
Route::get('dict/types',['\App\Http\Controllers\Api\DictionariesController','getLevelDict']);
Route::get('dict/levels',['\App\Http\Controllers\Api\DictionariesController','getTypesDict']);
Route::get('dict/classes',['\App\Http\Controllers\Api\DictionariesController','getClassDict']);
Route::get('answers-list/{id}',['\App\Http\Controllers\Api\AnswersController','getAnswersByQuestionId']);
Route::resource('battle', '\App\Http\Controllers\Api\BattleController', ['only' => ['index', 'show', 'update', 'store', 'destroy']]);
Route::resource('battle-fields', '\App\Http\Controllers\Api\BattleFieldsController', ['only' => ['index', 'show', 'update', 'store', 'destroy']]);
Route::get('battle-fields/{id}/list',['\App\Http\Controllers\Api\BattleFieldsController','getBattleFieldsByBattleId']);
Route::get('student-question/{id}',['\App\Http\Controllers\Api\QuestionsController','getStudentQuestionsByQuestionPackId']);



