<?php

use Illuminate\Http\Request;
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
Route::resource('categories',\App\Http\Controllers\CategoryController::class)->except(['show','update','edit']);
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
Route::get('/like/{article}', function (\App\Models\Article $article){
    $user_id = \Illuminate\Support\Facades\Auth::user()->id;
    $hasLiked = $article->likes()->where('user_id','=',$user_id)->first();
    if($hasLiked){
        $hasLiked->delete();
        return redirect()->back()->with(['success','removed']);
    }else{
        $article->likes()->create(['user_id'=>$user_id]);
        return redirect()->back()->with(['success','added']);
    }
});
//Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
Route::resource('jobs', App\Http\Controllers\JobsController::class);

Route::get( '/search/articles', function (Request $request) {
    $q = $request->q;
//    dd($q);
    if($q != ""){
        $articles = \App\Models\Article::where( 'title', 'LIKE', '%' . $q . '%' )->orWhere( 'content', 'LIKE', '%' . $q . '%' )->orderBy('id','desc')->paginate(15);
        $pagination = $articles->appends ( array (
            'q' => $request->q,
        ) );
//        $articles = (new \Spatie\Searchable\Search())->registerModel(\App\Models\Article::class,['title','content'])->search($q);
//        $articles = \App\Models\Article::search($q)->get();
//        dd($articles);
        if (count ( $articles ) > 0)
            return view ( 'articles.index' ,compact('articles','q'));
        return view ( 'articles.index',compact('articles','q') )->withMessage ( 'No Details found. Try to search again !' );
    }
    return redirect()->to('articles');
} );


