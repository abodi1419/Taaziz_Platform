<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request, Article $article) {
//        dd($article->id);
//        dd(Auth::user()->id);

        $validatedData = $request->validate(['content' => 'required']);

        $validatedData['article_id'] = $article->id;
        $validatedData['user_id'] = Auth::user()->id;

        $article->comments()->create($validatedData);

        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        // To verify that no one will delete someone else's article
        if (Auth::id() != $comment->user_id){
            return abort(401);
        }

        $comment->delete();
        return redirect()->back();
    }
}
