<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articledata = Article::all();
        return view('articles.index', compact('articledata'));
    }
    public function show($id)
    {
        // dd('here');
        // dd($id);
        $articledata = Article::find($id);

        // dd($category);
        return view('articles.show', compact('articledata'));
    }
}
