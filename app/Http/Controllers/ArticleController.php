<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use DB;

class ArticleController extends Controller
{
    public function saveArticle(Request $request)
    {
        \Log::info(json_encode($request->all()));

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        return redirect('/');   
    }

    public function showArticles()
    {
        $articles = Article::all();
        return view('showArticles', compact('articles'));
    }



    public function deleteArticles(Request $request)
    {
        if ($request->has('article_ids')) {
        // Delete selected articles
        Article::whereIn('id', $request->article_ids)->delete();
    }

    return redirect()->route('showArticles')->with('success', 'Selected articles deleted successfully!');
    }


    public function editeArticle($id)
    {
        $article = Article::findOrFail($id);  // Find the article by ID
        return view('editeArticle', compact('article'));  // Pass article to the view
    }

    public function updateArticle(Request $request, $id)
{
    $article = Article::find($id);
    $article->title = $request->title;
    $article->content = $request->content;
    $article->save();

    return redirect()->route('showArticles')->with('success', 'Article updated successfully!');
}


}
