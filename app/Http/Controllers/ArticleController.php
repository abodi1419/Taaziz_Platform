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
        $articles = Article::orderBy('id','DESC')->get();
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
           'title' => 'max:100|min:10|required',
            'content' => 'min:140|required',
            'categories' => 'required'
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


    public function like(Request $request){
        $like_status = $request->like_status;
        $article_id = $request->article_id;

        $like = DB::table('likes')
            ->where('article_id', $article_id)
            ->where('user_id', Auth::user()->id)
            ->first();

//        Create a like if it doesn't exist
        if(!$like){
            $new_like = new Like();
            $new_like->article_id = $article_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 1;
            $new_like->save();
        }

//        Delete a like if it exists
        elseif ($like->like == 1){
            DB::table('likes')
                ->where('article_id', $article_id)
                ->where('user_id', Auth::user()->id)
                ->delete();
        }

    }


}
