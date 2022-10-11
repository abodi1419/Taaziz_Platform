<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('categories:title')->orderBy('id','DESC')->paginate(15);
        return view('articles.index',compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('title','id');
        return view('articles.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'max:100|min:10|required',
            'content' => 'min:140|required',
            'categories' => 'required'
        ]);


        $user = Auth::user();
        $categories = array_values($request->categories);
        $article = $user->articles()->create($request->except('categories'));
        $article->categories()->attach($categories);


        return redirect()->to('/myArticles');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // To verify that no one will change someone else's article
        if (Auth::id() != $article->user_id){
            return abort(401);
        }

        $categories = Category::all()->pluck('title','id');

        $articleCategories = $article->categories()->pluck('id') ->toArray();

        return view('articles.edit',compact('categories','article','articleCategories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // To verify that no one will change someone else's article
        if (Auth::id() != $article->user_id){
            return abort(401);
        }

        $request->validate([
           'title' => 'string|max:255|min:2|required',
            'content' => 'string|min:50|required',
            'categories' => 'required|exists:categories,title'
        ]);

//        $article->title =  $request['title'];
//        $article->content =  $request['content'];
//        $article->save();

        // short line to update article
        $article->update($request->all());

        $article->categories()->sync($request->categories);

        return redirect()->to('/myArticles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // To verify that no one will delete someone else's article
        if (Auth::id() != $article->user_id){
            return abort(401);
        }

        $article->delete();
        return redirect()->back();
    }

    /**
     * Like the specified article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function like(Article $article){
        dd($article);
    }

    public function search($keyword){

    }


}
