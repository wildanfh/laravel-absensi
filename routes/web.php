<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ScheduleController;
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

Route::get('/', [HomeController::class, 'index']);

// route resource
Route::resource('students', StudentController::class);

Route::get('groups/{id}/attendances', [GroupController::class, 'attendances']);

Route::post('groups/{id}/attendances_store', [GroupController::class, 'attendances_store']);

Route::get('groups/{id}/quizzes', [GroupController::class, 'quizzes']);

Route::resource('groups', GroupController::class);

Route::resource('groups.members', MemberController::class);

Route::resource('members', MemberController::class);

Route::resource('schedules', ScheduleController::class);

Route::resource('schedules.presences', PresenceController::class)->shallow();

Route::resource('presences', PresenceController::class);

Route::resource('quizzes', QuizController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
