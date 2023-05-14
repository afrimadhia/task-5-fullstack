<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('article.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('images');

        $newPost = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id
        ]);

        $category = Category::find($request->category_id);
        if ($category) {
            $category->user_id = Auth::id();
            $category->save();
        }

        return redirect('dashboard/article/' . $newPost->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {

        return view('article.show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {

        $path = $request->file('image')->store('images');
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path
        ]);

        return redirect('dashboard/article/' . $article->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/dashboard/article');
    }

    public function showArticles(Request $request)
    {
        $articles = Article::all();

        return view('article', [
            'articles' => $articles
        ]);
    }
}
