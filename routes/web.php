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
    if(!auth()->user()){
        return redirect()->to('login');
    }
    else{
        return view('home');
    }
});

//Auth::routes();
// Authentication Routes...
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', [App\Http\Controllers\StudentController::class, 'create'])->name('register');
//$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('users', App\Http\Controllers\UserManagementController::class);
Route::resource('student',\App\Http\Controllers\StudentController::class)->except('show');
Route::resource('profile',\App\Http\Controllers\ProfileController::class)->except('show');
Route::resource('skills',\App\Http\Controllers\SkillController::class)->except('show');
Route::resource('experiences',\App\Http\Controllers\ExperienceController::class)->except('show');
Route::resource('projects',\App\Http\Controllers\ProjectController::class)->except('show');
Route::resource('certifications',\App\Http\Controllers\CertificationController::class)->except('show');
Route::resource('languages',\App\Http\Controllers\LanguageController::class)->except('show');
Route::resource('contacts',\App\Http\Controllers\ContactController::class)->except('show');
Route::get('/locale/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ar'])) {
        abort(400);
    }
    session(['my_locale' => $locale]);

    return redirect()->back();
    //
});
Route::get('hello/{name}',function ($name){
    return "hello ".$name;
});
Route::get('/user-icon/{file}', function ($file){
    //This method will look for the file and get it from drive

    $path = 'storage/uploads/icons/' . $file;
//    return $path;
    try {
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    } catch (FileNotFoundException $exception) {
        abort(404);
    }
});

Route::resource('articles',\App\Http\Controllers\ArticleController::class);

Route::post('comments/{article}','\App\Http\Controllers\CommentController@store')->name('comments.store');
//Route::resource('comments',\App\Http\Controllers\CommentController::class);


Route::get('/myArticles', [App\Http\Controllers\MyArticlesController::class, 'index'])->name('myArticles');
Route::get('/like', '\App\Http\Controllers\ArticleController@like')->name('articles.like');
Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
Route::resource('jobs', App\Http\Controllers\JobsController::class);


