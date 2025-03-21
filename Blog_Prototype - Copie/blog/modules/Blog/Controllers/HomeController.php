<?php

namespace Modules\Blog\Controllers;

use Modules\Blog\Models\Article;
use Illuminate\Http\Request;
use Modules\Core\Controllers\Controller;


class HomeController extends Controller
{
    // Show the main dashboard
    public function admin()
    {
        return view('admin.dashboard');
    }

    // Show the homepage with all articles
    public function index()
    {
        $articles = Article::latest()->get();
        return view('public.home', compact('articles'));
    }

    // Show a single article for the public
    public function show(Article $article)
    {
        return view('public.article', compact('article'));
    }
}

