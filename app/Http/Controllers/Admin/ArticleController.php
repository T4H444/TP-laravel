<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Data\ArticlesData;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $isAdmin = $request->query('admin'); // Get the ?admin=1 from URL
        if (request()->query('admin') !== '1') {
            abort(403, 'Unauthorized.');
        }
        $articles = ArticlesData::getArticles();
    
        return view('admin.dashboard', [
            'articles' => $articles,
            'adminMode' => $isAdmin == '1' // Pass boolean to Blade
        ]);
    }
    

    public function show(Request $request)
    {
        $articleById = ArticlesData::getArticleById($request->route('id'));
        $adminMode = $request->query('admin') == '1';
    
        return view('admin.show', [
            'article' => $articleById,
            'adminMode' => $adminMode
        ]);
    }
    

    public function edit(Request $request, $id)
    {
        $articleById = ArticlesData::getArticleById($id);
        $allTags = ['PHP', 'Laravel', 'Framework', 'Web', 'Routing', 'URL', 'HTTP', 'Contrôleurs', 'MVC', 'Architecture', 'API', 'Sécurité', 'Sanctum', 'Authentification', 'Performance', 'Optimisation', 'Cache'];
        $adminMode = $request->query('admin') == '1';
    
        return view('admin.edit', [
            'article' => $articleById,
            'allTags' => $allTags,
            'adminMode' => $adminMode
        ]);
    }
    
    
}
