<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Simulons quelques articles
        $articles = [
            ['id' => 1, 'name' => 'Article 1'],
            ['id' => 2, 'name' => 'Article 2'],
            ['id' => 3, 'name' => 'Article 3'],
        ];

        return view('articles.index', compact('articles'));
    }

    public function destroy($id)
    {
        // Ici vous mettriez la logique de suppression
        // Par exemple: Article::find($id)->delete();
        
        return redirect()->back()->with('message', "Article $id supprimé avec succès");
    }
}