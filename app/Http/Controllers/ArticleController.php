<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use DB;

class ArticleController extends Controller
{
    // function to save article
    public function saveArticle(Request $request)
    {
        \Log::info(json_encode($request->all()));// Log the request data(for error handling)

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();
        return redirect('/');   
    }

    // function to show all the created articles
    public function showArticles()
    {
        $articles = Article::all();
        return view('showArticles', compact('articles'));
    }


    // function to delete selected articles(via checkboxes)
    public function deleteArticles(Request $request)
    {
        if ($request->has('article_ids')) {
        // Delete selected articles
        Article::whereIn('id', $request->article_ids)->delete();
    }

    // Redirect to the showArticles route with success message
    return redirect()->route('showArticles')->with('success', 'Selected articles deleted successfully!');
    }


    // function to edite the selected article
    public function editeArticle($id)
    {
        $article = Article::findOrFail($id);  // Find the article by ID
        return view('editeArticle', compact('article'));  // Pass article to the view
    }


    // function to update the selected article
    public function updateArticle(Request $request, $id)
{
    $article = Article::find($id);
    $article->title = $request->title;
    $article->content = $request->content;
    $article->save();

    return redirect()->route('showArticles')->with('success', 'Article updated successfully!');
}


}
