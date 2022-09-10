<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('users', App\Http\Controllers\UserManagementController::class);
Route::resource('student',\App\Http\Controllers\StudentController::class)->except('show');
Route::resource('profile',\App\Http\Controllers\ProfileController::class)->except('show');
Route::resource('skills',\App\Http\Controllers\SkillController::class)->except('show');
Route::resource('experiences',\App\Http\Controllers\ExperienceController::class)->except('show');
Route::resource('projects',\App\Http\Controllers\ProjectController::class)->except('show');
