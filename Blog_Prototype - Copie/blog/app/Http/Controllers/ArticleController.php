<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Show all articles in the admin panel
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    // Show the form to create a new article
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    // Store a newly created article
    public function store(ArticleRequest $request)
    {
        $validated = $request->validated();
        $validated["user_id"] = Auth::id(); // Ensure user is authenticated
        $validated["category_id"] = $request->category_id; // Fix category assignment
        
        Article::create($validated);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    // Show the form to edit an existing article
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

            
    // Update an existing article
    public function update(ArticleRequest $request, Article $article)
    {
        $validated = $request->validated();
        $validated["category_id"] = $request->category_id; // Ensure correct category assignment

        $article->update($validated);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }


    // Delete an article
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
