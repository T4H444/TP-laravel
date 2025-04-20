<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\ArticlesData;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $articles = ArticlesData::getArticles();
        return view('articles.index', [
            'articles' => $articles,
            'request' => $request
        ]);
    }

    public function show(Request $request)
    {
        $articleById = ArticlesData::getArticleById($request->route('id'));
        return view('articles.show', ['article' => $articleById]);
    }

    public function category(Request $request)
    {
        $articlesByCategory = ArticlesData::getArticlesByCategory($request->route('category'));
        return view('acticles.category', ['atricles' => $articlesByCategory]);
    }

    public function about()
    {
        return view('articles.about');
    }
    
}
